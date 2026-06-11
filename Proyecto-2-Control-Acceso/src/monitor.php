<?php
session_start();

// Seguridad: sesión y nivel
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
if (!isset($_SESSION['nivel']) || (int)$_SESSION['nivel'] !== 3) {
    header("Location: pagina.php");
    exit();
}
$nivel = (int)$_SESSION['nivel'];

define('AUDIT_LOG', __DIR__ . '/auditoria.txt');

// Cargar líneas del log (si existe y es legible)
$lineas = [];
if (is_readable(AUDIT_LOG)) {
    // Intentar lectura con bloqueo compartido
    $fh = fopen(AUDIT_LOG, 'r');
    if ($fh !== false) {
        if (flock($fh, LOCK_SH)) {
            // Leer todo y convertir en líneas
            $content = stream_get_contents($fh);
            flock($fh, LOCK_UN);
            if ($content !== false && $content !== '') {
                $lineas = explode("\n", rtrim($content, "\n"));
                // Mostrar más recientes primero (opcional)
                $lineas = array_reverse($lineas);
            }
        }
        fclose($fh);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monitor de Seguridad - BioCorp</title>
    <style>
        body { font-family: sans-serif; background: #1a1a1a; color: white; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: #2d2d2d; }
        th, td { padding: 12px; border: 1px solid #444; text-align: left; vertical-align: top; }
        .alerta { background-color: #ff2b2b !important; color: white; font-weight: bold; }
        .sin-registros { color: #cfcfcf; padding: 20px; background: #2d2d2d; border-radius: 8px; }
        nav a { color: #ffffff; text-decoration: none; margin-right: 12px; font-weight: bold; }
    </style>
</head>
<body>
  <nav style="background: #2d2d2d; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-bottom: 3px solid #555; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="pagina.php">[ Página principal ]</a>
        <?php if ($nivel === 3): ?>
            <a href="monitor.php" style="color: #00ff00;">[ Monitor de Auditoría ]</a>
        <?php endif; ?>
    </div>
    <div>
        <a href="logout.php" style="color: #ff4d4d;">[ Salir ]</a>
    </div>
  </nav>

  <h2>Monitor de Auditoría en Tiempo Real</h2>

  <?php if (empty($lineas)): ?>
    <div class="sin-registros">No hay registros en auditoria.txt.</div>
  <?php else: ?>
    <table>
        <tr><th>Registro de Evento</th></tr>
        <?php foreach ($lineas as $linea): 
            if (trim($linea) === '') continue;
            // Detectar ALERTA o DENEGADO (case-insensitive)
            $is_alerta = (stripos($linea, 'ALERTA') !== false) || (stripos($linea, 'DENEGADO') !== false);
        ?>
            <tr class="<?php echo $is_alerta ? 'alerta' : ''; ?>">
                <td><?php echo nl2br(htmlspecialchars($linea, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
  <?php endif; ?>

  <br>
  <a href="index.php" style="color:white;">Volver al Login</a>
</body>
</html>

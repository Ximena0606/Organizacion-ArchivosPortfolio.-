<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$nivel = $_SESSION['nivel'];

$archivo = "auditoria.txt";
$lineas = [];

if (file_exists($archivo)) {
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel</title>

<style>
body { font-family: sans-serif; background:#1a1a1a; color:white; padding:20px; }
.card { background:#2d2d2d; padding:20px; border-radius:10px; margin-bottom:20px; }

table { width:100%; border-collapse: collapse; }
th, td { padding:10px; border:1px solid #444; }

.alerta {
    background:#ff2b2b;
    color:white;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="card">
<h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
<p>Nivel: <?php echo $nivel; ?></p>
</div>

<!-- 🔴 TABLA CORRECTA -->
<div class="card">
<h2>Registro de Auditoría</h2>

<table>
<tr><th>Evento</th></tr>

<?php
foreach ($lineas as $linea) {

    // 🔥 CORRECCIÓN IMPORTANTE (case-insensitive)
    $es_alerta = stripos($linea, "ALERTA") !== false 
              || stripos($linea, "DENEGADO") !== false;

    echo "<tr class='".($es_alerta ? "alerta" : "")."'>
            <td>".htmlspecialchars($linea)."</td>
          </tr>";
}
?>

</table>
</div>

<a href="logout.php" style="color:white;">Salir</a>

</body>
</html>

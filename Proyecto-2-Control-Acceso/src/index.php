<?php
session_start();

define('USUARIOS_JSON', __DIR__ . '/usuarios.json');
define('AUDIT_LOG', __DIR__ . '/auditoria.txt');

function append_log($texto) {
    $fh = fopen(AUDIT_LOG, 'a');
    if ($fh === false) return false;

    if (flock($fh, LOCK_EX)) {
        fwrite($fh, $texto);
        fflush($fh);
        flock($fh, LOCK_UN);
    }

    fclose($fh);
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_tarjeta'])) {

    $id_ingresado = trim($_POST['id_tarjeta']);

    if ($id_ingresado === '' || !preg_match('/^\d{2,10}$/', $id_ingresado)) {
        $error = "ID inválido";
    } else {

        $json_content = file_get_contents(USUARIOS_JSON);
        $usuarios = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $error = "Error en JSON";
        } else {

            $encontrado = null;

            foreach ($usuarios as $u) {
                if (isset($u['id_tarjeta']) && $u['id_tarjeta'] === $id_ingresado) {
                    $encontrado = $u;
                    break;
                }
            }

            $timestamp = date("Y-m-d H:i:s");

            if ($encontrado) {

                $nombre = $encontrado['nombre_empleado'];
                $depto  = $encontrado['departamento'];
                $nivel  = $encontrado['nivel_seguridad'];

                append_log("[$timestamp] ACCESO CONCEDIDO: $nombre ($depto)\n");

                session_regenerate_id(true);
                $_SESSION['usuario'] = $nombre;
                $_SESSION['departamento'] = $depto;
                $_SESSION['nivel'] = $nivel;

                header("Location: pagina.php");
                exit();

            } else {

                append_log("[$timestamp] ACCESO DENEGADO - ALERTA - ID: $id_ingresado\n");
                $error = "ID NO REGISTRADO";
            }
        }
    }
}
?>

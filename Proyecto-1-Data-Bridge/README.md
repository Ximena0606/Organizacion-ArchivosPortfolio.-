# Proyecto 1 - Actividad de Evaluación Corte 1 (Data-Bridge)

## Descripción del Sistema

KLIK es un sistema de gestión de inventario desarrollado utilizando PHP, HTML y CSS. Su propósito es facilitar la administración, consulta y análisis de productos mediante una arquitectura basada en archivos planos.

El sistema permite visualizar el inventario completo, filtrar productos según diferentes criterios, generar reportes en PDF y administrar registros mediante operaciones de edición y eliminación. Asimismo, implementa mecanismos de autenticación mediante sesiones para controlar el acceso de los usuarios.

## Tecnologías Utilizadas

* PHP
* HTML
* CSS
* FPDF

## Formatos de Archivo Utilizados

* TXT
* CSV

## Justificación del Formato

Se utilizaron archivos de texto plano y estructuras tipo CSV para almacenar la información del inventario debido a su simplicidad y bajo costo computacional. La escritura secuencial mediante operaciones de apertura y anexado permite procesar grandes cantidades de información sin requerir sistemas gestores de bases de datos.

## Archivos Principales

* Genesis.php: Generación inicial de 10,000 registros de inventario.
* InventarioCompleto.php: Visualización y administración del inventario.
* Persistencia.php: Procesamiento y filtrado de registros.
* Reportes.php: Generación de reportes administrativos.
* Visualizacion.php: Presentación de información al usuario.

## Competencias Aplicadas

* Organización de archivos secuenciales.
* Lectura y escritura de archivos.
* Persistencia de información.
* Procesamiento de grandes volúmenes de datos.
* Generación de reportes.

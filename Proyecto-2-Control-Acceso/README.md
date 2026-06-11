# Proyecto 2 - Control de Acceso (ABPj)

## Descripción del Sistema

Este sistema corresponde a un módulo de control de acceso diseñado para la gestión y validación de usuarios dentro de una plataforma de software. Su objetivo principal es garantizar que únicamente usuarios autorizados puedan acceder a las funcionalidades del sistema mediante un mecanismo de autenticación y persistencia de datos.

El sistema maneja información estructurada de usuarios y políticas de acceso utilizando formatos de archivo ligeros, permitiendo operaciones de lectura, escritura y actualización de manera eficiente.

## Tecnologías Utilizadas

* PHP
* HTML
* CSS
* JavaScript (si aplica)

## Formatos de Archivo Utilizados

* JSON
* XML

## Justificación del Formato

Se utilizó el formato JSON debido a su estructura ligera y su compatibilidad con estructuras tipo diccionario en memoria, lo que permite una validación rápida de credenciales mediante acceso directo a claves. Por otro lado, XML se utiliza como formato alternativo de almacenamiento estructurado, permitiendo una representación jerárquica de datos para configuraciones del sistema.

## Operaciones Implementadas

* Lectura de archivos JSON para validación de usuarios.
* Escritura de nuevos registros de acceso.
* Serialización y deserialización de datos.
* Control de sesiones para autenticación.

## Objetivo del Proyecto

Simular un sistema básico de control de acceso seguro, aplicando conceptos de organización de datos, persistencia y estructuras jerárquicas de información.

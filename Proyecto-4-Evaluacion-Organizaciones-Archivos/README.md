# Proyecto 4 - Evaluación General de Organizaciones de Archivos

## Descripción del Sistema

Este proyecto consiste en un entorno experimental desarrollado en Python para evaluar el rendimiento de diferentes organizaciones de archivos mediante la simulación de un sistema hospitalario. El sistema genera grandes volúmenes de registros clínicos y almacena la información en formatos CSV y JSON con el propósito de analizar su comportamiento en términos de rendimiento, almacenamiento y escalabilidad.

La aplicación permite generar millones de registros de pacientes simulados, registrar nuevos pacientes, realizar búsquedas, medir tiempos de lectura y escritura, evaluar el consumo de memoria RAM y generar análisis estadísticos sobre los datos almacenados.

## Tecnologías Utilizadas

* Python 3
* Pandas
* CSV
* JSON
* Matplotlib
* Tracemalloc

## Formatos de Archivo Utilizados

* CSV
* JSON

## Justificación del Formato

El formato CSV fue utilizado debido a su simplicidad estructural, bajo consumo de almacenamiento y alta velocidad de procesamiento para datos tabulares masivos. Por otra parte, JSON fue implementado para representar información médica jerárquica, permitiendo almacenar estructuras complejas como consultas, medicamentos y especialidades asociadas a cada paciente.

La comparación entre ambos formatos permitió evaluar el equilibrio entre rendimiento computacional y flexibilidad estructural.

## Funcionalidades Implementadas

* Generación automática de registros hospitalarios.
* Almacenamiento masivo de información en CSV y JSON.
* Registro de nuevos pacientes.
* Búsqueda por identificador.
* Búsqueda por nombre.
* Medición de tiempos de lectura.
* Medición de tiempos de escritura.
* Evaluación de consumo de memoria RAM.
* Comparación de tamaños de archivo.
* Análisis estadístico de pacientes.
* Generación de gráficas para visualización de resultados.

## Operaciones de Archivos Implementadas

* Apertura de archivos mediante `open()`.
* Escritura secuencial utilizando `csv.DictWriter()`.
* Serialización de estructuras mediante `json.dumps()`.
* Deserialización utilizando `json.load()`.
* Lectura secuencial de registros.
* Registro de información mediante modo append (`a`).

## Resultados Obtenidos

Las pruebas demostraron que CSV presenta una mayor eficiencia en almacenamiento y velocidad de procesamiento para grandes volúmenes de información. Sin embargo, JSON ofrece una mayor capacidad para representar estructuras complejas y relaciones jerárquicas, características esenciales en sistemas hospitalarios reales.

## Competencias Aplicadas

* Organización y administración de archivos.
* Evaluación de estructuras de almacenamiento.
* Procesamiento masivo de datos.
* Medición de rendimiento computacional.
* Visualización e interpretación de información.
* Apoyo a la toma de decisiones mediante análisis de datos.

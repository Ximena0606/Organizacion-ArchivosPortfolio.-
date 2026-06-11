# Proyecto 4 - Evaluación General de Organizaciones de Archivos

## Descripción del Sistema

Este proyecto consiste en un entorno de evaluación y análisis del rendimiento de diferentes organizaciones de archivos mediante la simulación de cargas masivas de datos. El sistema fue diseñado para analizar el comportamiento de los formatos de almacenamiento bajo diferentes volúmenes de información.

Se implementaron pruebas de estrés utilizando grandes cantidades de registros simulados, con el objetivo de medir el rendimiento, la eficiencia de almacenamiento y la escalabilidad de los sistemas basados en archivos.

## Tecnologías Utilizadas

* Python
* Pandas

## Formatos de Archivo Utilizados

* CSV
* JSON

## Justificación del Formato

El formato CSV fue seleccionado por su eficiencia en almacenamiento y rapidez de lectura en grandes volúmenes de datos, ya que no contiene estructuras jerárquicas complejas. Por otro lado, JSON se utilizó debido a su capacidad para representar estructuras anidadas, permitiendo simular información más compleja como expedientes o registros con múltiples atributos.

## Evaluación del Sistema

El sistema permitió comparar el rendimiento entre ambos formatos en escenarios de alta carga, observando diferencias en:

* Tiempo de lectura
* Tiempo de escritura
* Consumo de memoria
* Escalabilidad del sistema

## Conclusión

Se concluye que no existe un único formato óptimo, sino que su elección depende del tipo de datos y el objetivo del sistema. CSV es más eficiente en volumen, mientras que JSON ofrece mayor flexibilidad estructural.

import pandas as pd
import matplotlib.pyplot as plt

# Leer archivo CSV
datos = pd.read_csv("ventas_cafeteria.csv")

# Calcular ingresos
datos["ingresos"] = datos["cantidad"] * datos["precio"]

# Producto más vendido
producto_top = datos.loc[datos["cantidad"].idxmax(), "producto"]

# Generar reporte
with open("reporte.txt", "w", encoding="utf-8") as reporte:
    reporte.write("REPORTE DE VENTAS\n")
    reporte.write("=================\n\n")

    reporte.write("Ventas por producto:\n")
    reporte.write(datos.to_string(index=False))

    reporte.write("\n\nProducto más vendido:\n")
    reporte.write(producto_top)

print("Reporte generado correctamente.")

# Gráfica de barras
plt.figure(figsize=(8,5))
plt.bar(datos["producto"], datos["cantidad"])
plt.title("Ventas por Producto")
plt.xlabel("Producto")
plt.ylabel("Cantidad")
plt.show()

# Gráfica circular
plt.figure(figsize=(6,6))
plt.pie(
    datos["cantidad"],
    labels=datos["producto"],
    autopct="%1.1f%%"
)
plt.title("Distribución de Ventas")
plt.show()

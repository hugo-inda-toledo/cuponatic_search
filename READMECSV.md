# Cuponatic Search

Servicio de búsqueda básico, el cual recibe una búsqueda como string y devuelve un json con los productos encontrados.


#Ingreso de datos

Método con MySQL Workbench

1. Al hacer click con botón derecho se debe seleccionar "Table Data Export Wizard"
2. Seleccionar el archivo .csv
3. Asociar cada columna de la tabla en el mismo orden que lo tiene el .csv
4. Click en "Next" para ejecutar.

Método con SQL

1. Una véz creada la tabla se debe ejecutar la siguiente sentencia:
	
```bash
LOAD DATA INFILE '/ruta/del/csv.csb'
INTO TABLE "tabla_donde_almacenar_los_datos"
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;
```


	

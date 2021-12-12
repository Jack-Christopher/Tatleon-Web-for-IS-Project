# Casos de Prueba

## **Función** *print_header($header) :*
$header es un parámetro de tipo Header que cuenta con 4 atributos:
* private  $title;
* private  $css_path;
* private  $js_path;
* private  $icon_path;
Que son el título y la ubicación de los archivos necesarios.

| Caso de Prueba| Valor de Entrada| Resultado Esperado |
| ----------- | ----------- | ----------- |
| Solo Título | Un objeto de tipo Header que solo tenga el titulo establecido  | 1101 |
| Solo Archivo CSS | Un objeto de tipo Header que solo tenga la ubicación al Archivo CSS | 1011 |
| Solo Archivo JS | Un objeto de tipo Header que solo tenga la ubicación al Archivo JS | 111 |
| Solo Icono | Un objeto de tipo Header que solo tenga la ubicación al ícono | 1110 |
| Completo  | Un objeto de tipo Header con todos sus atributos establecidos | 0 |
| Vacio| Un objeto de tipo Header con ningún atributo establecido | 1111 |



## **Función** *getNombresCompletos()* de la clase User :

| Caso de Prueba| Valor de Entrada| Resultado Esperado |
| ----------- | ----------- | ----------- |
| Nombres y Apellidos disponibles | nombres=Jack Christopher, apellidos= Huaihua Huayhua  | Huaihua Huayhua, Jack Christopher|
| Nombres y Apellidos disponibles | nombres=Rodrigo Jesus, apellidos= Santisteban Pachari  | Santisteban Pachari, Rodrigo Jesus|
| Nombres disponibles y Apellidos no disponibles | nombres=, apellidos=  | N, N|
| Nombres no disponibles y Apellidos disponibles | nombres=, apellidos=  | N, N|
| Nombres y Apellidos no disponibles | nombres=, apellidos=  | N, N|


## **Función** *getAtributo($atributo)* de la clase User :
| Caso de Prueba| Valor de Entrada| Resultado Esperado |
| ----------- | ----------- | ----------- |
| Obtener atributo ID disponible | Usuario con id=5 | 5|
| Obtener atributo nombre disponible | Usuario con nombre=Jack Christopher | Jack Christopher |
| Obtener atributo email disponible | Usuario con email=jack@gmail.com | jhuaihuah@unsa.edu.pe|
| Obtener atributo nombre de usuario disponible | Usuario con nombre de usuario=JC | JC|
| Obtener atributo no existente telefono | Usuario cualquiera | null|
| Obtener atributo no existente edad | Usuario cualquiera | null|
| Obtener atributo no existente direccion | Usuario cualquiera | null|
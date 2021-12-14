## Refactoring code

### Bad smells in code
> resources/js/register.js
```php
var  nombres = $("#name");
var  apellidos = $("#last_name");
// var escuela = $("#school");
```
> resources/js/register.js
```php
else  
 {
	 alertify.alert("No se pudo completar el proceso.");
	 // alertify.alert(data);
```
> resources/js/register.js

```php
  return false;
  }
  // else if (escuela.val() == "null") 
  // {
  //     var op = alertify.alert("Debe seleccionar una escuela.");
  //     return false;
  // }
  else  if (correo_electronico.val() == "")
```
***


### Duplicate code
>resources/js/verification.js
```php
function formEsValido() 
{
    var codigo = $("#verification_code");
    var user_name = $("#username");
    if (codigo.val() == "") 
    {
        var op = alertify.alert("Debe colocar su codigo de verificacion.");
        return false;
    }
    else if (user_name.val() == "") 
    {
        var op = alertify.alert("Debe haberse registrado previamente.");
        return false;
    }

    return true;
}
```
**Corrección**
```php
function formEsValido() 
{
    var codigo = $("#verification_code");
    var user_name = $("#username");
    let op;
    if (codigo.val() == "") 
    {
        op = alertify.alert("Debe colocar su codigo de verificacion.");
        return false;
    }
    else if (user_name.val() == "") 
    {
        op = alertify.alert("Debe haberse registrado previamente.");
        return false;
    }

    return true;
}
```



### Simplifying Conditional Expressions
> index.php

```php
if (isset($_GET['logout']))
{
	if ($_GET['logout'] == "true")
	{
	session_destroy();
	header("Location: index.php");
	}
}
```
**Corrección**

```php
if (isset($_GET['logout']) && ($_GET['logout'] == "true"))
{
	session_destroy();
	header("Location: index.php");
}
```

### Declaration to make it explicit.

```php
$(document).ready(function() 
{
	$("#submit_button").click(function() 
	{
		if (formEsValido()) 
		{
			cadena = $("#login_form").serialize();
```

**Corrección**


```php
$(document).ready(function() 
{
	$("#submit_button").click(function() 
	{
		if (formEsValido()) 
		{
			let cadena = $("#login_form").serialize();
```

### Making Method Calls Simpler

> resources/views/*.php
```php
<?php  print_header('Agregar enlace', '../css/login.css', '../js/add_link.js', '../../public/favicon.ico'); ?>
```
**Corrección**
```php
class Header{
	private $title;
	private $css_path;
	private $js_path;
	private $icon_path;

	public function __construct($title, $css_path, $js_path, $icon_path)
	{
		$this->title = $title;
		$this->css_path = $css_path;
		$this->js_path = $js_path;
		$this->icon_path = $icon_path;
	}

```

```php
$header = new Header('Agregar enlace', '../css/login.css', '../js/add_link.js', '../../public/favicon.ico');

print_header($header);
```

### Unused variable

> resources/js/register.js

```php
else  if (nombre_de_usuario.val() == "") 
{
  var  op = alertify.alert("Debe colocar su nombre de usuario.");
  
```


## Code Smells extras


### Constant names should comply with a naming convention

>app/models/user.php

- Rename this constant "Administrador" to match the regular expression

```php
define('Administrador', 1);
define('Docente', 2);
define('Estudiante', 3);
```
### Attributes deprecated in HTML5 should not be used

>index.php

```html
<div class="container" align="center" style="padding:2%;">
```

```html
<div class="container" align="center" style="padding:2%;">
```
>resources/views/login.php
>
```html
<body background="../img/blue_background.jpg" style="background-size: cover">
```



### Extra semicolons should be removed

>resources/css/login.css

```css
width: 60% !important;;
```
```css
width: 80% !important;;
```

### Variables should be declared explicitly

>resources/css/login.css

```php
cadena = $("#login_form").serialize();
```

>resources/js/register.js

```php
cadena = $("#signup_form").serialize();
```



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
| Obtener atributo email disponible | Usuario con email=jack@gmail.com | jack@gmail.com |
| Obtener atributo nombre de usuario disponible | Usuario con nombre de usuario=JC | JC|
| Obtener atributo no existente telefono | Usuario cualquiera | null|
| Obtener atributo no existente edad | Usuario cualquiera | null|
| Obtener atributo no existente direccion | Usuario cualquiera | null|

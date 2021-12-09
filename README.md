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


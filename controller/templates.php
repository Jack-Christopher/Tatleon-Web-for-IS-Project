<?php

function print_header($title, $css_file, $js_file, $icon_file)
{
    echo '<!DOCTYPE html>';
    echo '<html lang="es">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>' . $title .'</title>';
    //  agregar archivo css
    if ($css_file != '') 
    {
        echo '<link rel="stylesheet" href="resources\\css\\' . $css_file .'.css">';
    }
    // agregar archivo bootstrap
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
    // agregar icono
    if ($icon_file != '') 
    {
        echo '<link rel="icon" href="public\\' . $icon_file . '.ico">';
    }
    // agregar archivo js
    if ($js_file != '') 
    {
        echo '<script src="resources\\js\\' . $js_file .'.js"></script>';
    }
    echo '</head>';
}
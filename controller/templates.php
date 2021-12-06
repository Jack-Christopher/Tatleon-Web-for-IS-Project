<?php

function print_header($title, $css_file, $js_file, $icon_file)
{
    echo '<html lang="es">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>' . $title .'</title>';
    //  agregar archivo css
    if ($css_file != '') 
    {
        echo '<link rel="stylesheet" href="resources\\css\\' . $css_file .'">';
    }
    // agregar icono
    if ($icon_file != '') 
    {
        echo '<link rel="icon" href="public\\' . $icon_file . '">';
    }
    // agregar archivo js
    if ($js_file != '') 
    {
        echo '<script src="resources\\js\\' . $js_file .'"></script>';
    }
    // agregar archivo bootstrap
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>';
    // agregar archivo ajax
    echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>';
    // agregar archivo alertify
    echo '<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />';
    echo '<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>';

    echo '</head>';
}

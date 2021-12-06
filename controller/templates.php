<?php
function print_header($title, $css_path, $js_path, $icon_path)
{
    echo '<html lang="es">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>' . $title .'</title>';
    //  agregar archivo css
    if ($css_path != '') 
    {
        echo '<link rel="stylesheet" href="' . $css_path .'">';
    }
    // agregar icono
    if ($icon_path != '') 
    {
        echo '<link rel="icon" href="' . $icon_path . '">';
    }
    // agregar archivo js
    if ($js_path != '') 
    {
        echo '<script src="' . $js_path .'"></script>';
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

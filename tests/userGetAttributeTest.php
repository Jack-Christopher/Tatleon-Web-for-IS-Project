<?php declare(strict_types=1);

require_once('../app/models/user.php');

// final class headerTest extends PHPUnit_Framework_TestCase
final class userTest extends PHPUnit_Framework_TestCase 
{
    // Obtener atributo ID disponible
    public function testGetId()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("id");
        $this->assertTrue(
            5 ==  $resultado
        );
    }
    // Obtener atributo nombre disponible
    public function testGetNombre()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("nombres");
        $this->assertTrue(
            'Jack Christopher' ==  $resultado
        );
    }
    // Obtener atributo email disponible
    public function testGetEmail()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("email");
        $this->assertTrue(
            'jack@gmail.com' ==  $resultado
        );
    }
    // Obtener atributo nombre de usuario disponible
    public function testGetNombreUsuario()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("username");
        $this->assertTrue(
            'JC' ==  $resultado
        );
    }
    // Obtener atributo no existente telefono
    public function testGetTelefono()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("telefono");
        $this->assertTrue(
            null ==  $resultado
        );
    }
    // Obtener atributo no existente edad
    public function testGetEdad()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("edad");
        $this->assertTrue(
            null ==  $resultado
        );
    }
    // Obtener atributo no existente direccion
    public function testGetDireccion()
    {
        $user = new User(5, 'Jack Christopher', 'Huaihua Huayhua', 'jack@gmail.com', 0, 'JC', 0);
        $resultado = $user->getAtributo("direccion");
        $this->assertTrue(
            null ==  $resultado
        );
    }

}
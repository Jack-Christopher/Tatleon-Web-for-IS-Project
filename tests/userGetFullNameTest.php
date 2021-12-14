<?php declare(strict_types=1);

require_once('../app/models/user.php');

// final class headerTest extends PHPUnit_Framework_TestCase
final class userTest extends PHPUnit_Framework_TestCase 
{
    public function testNombresYApellidosDisponibles1(): void
    {
        $user = new User(1, 'Jack Christopher', 'Huaihua Huayhua', '', 0, '', 0);
        $resultado = $user->getNombresCompletos();
        $this->assertTrue(
            "Huaihua Huayhua, Jack Christopher" ==  $resultado
        );
    }
    public function testNombresYApellidosDisponibles2(): void
    {
        $user = new User(1, 'Rodrigo Jesus', 'Santisteban Pachari', '', 0, '', 0);
        $resultado = $user->getNombresCompletos();
        $this->assertTrue(
            'Santisteban Pachari, Rodrigo Jesus' ==  $resultado
        );
    }
    public function testNombresDisponiblesYApellidosNoDisponibles(): void
    {
        $user = new User(1, 'Angel Tomas', '', '', 0, '', 0);
        $resultado = $user->getNombresCompletos();
        $this->assertTrue(
            'N, N' ==  $resultado
        );
    }
    public function testNombresNoDisponiblesYApellidosDisponibles(): void
    {
        $user = new User(1, '', 'Chipana Perez', '', 0, '', 0);
        $resultado = $user->getNombresCompletos();
        $this->assertTrue(
            'N, N' ==  $resultado
        );
    }
    public function testNombresYApellidosNoDisponibles(): void
    {
        $user = new User(1, '', '', '', 0, '', 0);
        $resultado = $user->getNombresCompletos();
        $this->assertTrue(
            'N, N' ==  $resultado
        );
    }
}
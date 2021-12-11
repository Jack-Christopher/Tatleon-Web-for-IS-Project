<?php declare(strict_types=1);
// use PHPUnit\Framework\TestCase;
// require '../packages/vendor/autoload.php';

require_once('../app/models/header.php');
require_once('../controller/templates.php');

// final class headerTest extends PHPUnit_Framework_TestCase
final class headerTest extends PHPUnit_Framework_TestCase 
{
    public function testSoloTitulo(): void
    {
        $header = new Header('Main', '', '', '');
        $resultado = print_header($header);
        $this->assertTrue(
            1101 ==  $resultado
        );
    }
    public function testSoloArchivoCSS(): void
    {
        $header = new Header('', 'main.css', '', '');
        $resultado = print_header($header);
        $this->assertTrue(
            1011 ==  $resultado
        );
    }
    public function testSoloArchivoJS(): void
    {
        $header = new Header('', '', 'main.js', '');
        $resultado = print_header($header);
        $this->assertTrue(
            111 ==  $resultado
        );
    }
    public function testSoloIcono(): void
    {
        $header = new Header('', '', '', 'main.ico');
        $resultado = print_header($header);
        $this->assertTrue(
            1110 ==  $resultado
        );
    }
    public function testCompleto(): void
    {
        $header = new Header('Main', 'main.css', 'main.js', 'main.ico');
        $resultado = print_header($header);
        $this->assertTrue(
            0 ==  $resultado
        );
    }
    public function testVacio(): void
    {
        $header = new Header('', '', '', '');
        $resultado = print_header($header);
        $this->assertTrue(
            1111 ==  $resultado
        );
    }
}
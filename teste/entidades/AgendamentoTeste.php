<?php

use controllers\AgendamentoController;
use PHPUnit\Framework\TestCase;

final class AgendamentoTeste extends TestCase
{
    protected $testador;
    
    public function testValidarCpf(): void
    {
        $this->testador = new AgendamentoController;
        $this->assertTrue($this->testador->validarCpf('111.1111111-11'));
    }

    public function testQualquer2(): void
    {
        $this->assertEquals(2,2);
    }
}

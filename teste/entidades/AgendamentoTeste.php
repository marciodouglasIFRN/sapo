<?php
use PHPUnit\Framework\TestCase;
use entidades\Agendamento;

final class AgendamentoTeste extends TestCase
{
    protected $testador;
    
    public function testQualquer(): void
    {
        $this->testador = new Agendamento(1,"o",null);
        $this->assertEquals('Márcio','Márcio');
    }

    public function testQualquer2(): void
    {
        $this->assertEquals(2,2);
    }
}

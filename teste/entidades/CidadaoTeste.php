<?php
use PHPUnit\Framework\TestCase;
use entidades\Cidadao;

final class CidadaoTeste extends TestCase
{
    protected $testador;

    protected function setUp()
    {
        $this->testador = new Cidadao('Márcio','123');
    }
    public function testQualquer(): void
    {
        $this->assertEquals('Márcio','Márcio');
    }

    public function testQualquer2(): void
    {
        $this->assertEquals(2,2);
    }
}

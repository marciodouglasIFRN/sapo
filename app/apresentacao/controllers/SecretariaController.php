<?php
namespace controllers;

use fabricas\SecretariaFactory;
use GenericoController;
use respositorios\SecretariaRepositorio;

class SecretariaController extends GenericoController{
    protected $repositorio;
    protected $fabrica;
    function __construct()
    {
        $this->repositorio = new SecretariaRepositorio;
        $this->fabrica = new SecretariaFactory;
        parent::__construct($this->repositorio,$this->fabrica);
    }

    function atualizar($json)
    {
        
    }

    function diasAtendimentos($json)
    {
        return json_encode($this->repositorio->selecionarDiasDeAtendimento($this->fabrica->criar($json)));
    }
}
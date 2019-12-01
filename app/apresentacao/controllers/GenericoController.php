<?php

use fabricas\IEntidadeFactory;
use respositorios\IRepositorio;

abstract class GenericoController{

    protected $repositorio;
    protected $fabrica;
    

    function __construct(
        IRepositorio $repositorio,
        IEntidadeFactory $fabrica)
    {
        $this->repositorio = $repositorio;
        $this->fabrica = $fabrica;
    }

    function criar($json){
        $entidade = $this->fabrica->criar($json);
        $this->repositorio->inserir($entidade);
    }

    function excluir($json){
        $entidade = $this->fabrica->criar($json);
        return json_encode($this->repositorio->excluir($entidade));
    }

    function consultar($json){
        $entidade = $this->fabrica->criar($json);
        return json_encode($this->repositorio->selecionar($entidade));
    }

    function listar(){
        return json_encode($this->repositorio->selecionarTodos());
    }

    public function validarCPF($cpf):bool{
        if(strlen($cpf)!=14){
            return false;
        }
        return true;
    }

    abstract function atualizar($json);

    function render($html){
        include "html/".$html.'.html';
    }
}
<?php

namespace db;

use entidades\Persistente;
use respositorios\IRepositorio;

class ServicoRepositorio extends DBMySQL implements IRepositorio{
    public function __construct()
    {
        
    }
    public function inserir(Persistente $persistente){}
    public function atualizar(Persistente $persistente){}
    public function excluir(Persistente $persistente){}
    public function selecionar(Persistente $persistente){
        $sql = "SELECT * FROM `servico` WHERE secretaria_id = :id";
        return $this->select($sql,array('id'=>$persistente->getSecretaria()->getIdentificador()));
    }
    public function selecionarTodos(){
        $sql = "SELECT * FROM `servico` WHERE 1";
        return $this->select($sql,array());
    }
}
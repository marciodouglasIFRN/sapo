<?php
namespace db;

use entidades\Persistente;
use respositorios\IRepositorio;

class DiaRepositorio extends DBMySQL implements IRepositorio{
    public function __construct()
    {
        
    }
    public function inserir(Persistente $persistente){}
    public function atualizar(Persistente $persistente){}
    public function excluir(Persistente $persistente){}
    public function selecionar(Persistente $persistente){
        $sql = "SELECT dia.nome,atendimentos FROM `dia`,`dia_secretaria`,`secretaria` WHERE dia.id = dia_id and secretaria.id = :id";
        return $this->select($sql,array("id"=>1));
    }
    public function selecionarTodos(){}
}
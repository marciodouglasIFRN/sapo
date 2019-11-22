<?php

namespace db;
use entidades\Persistente;
use respositorios\IRepositorio;

class AgendamentoRepositorio extends DBMySQL implements IRepositorio {
    public function __construct(){
    }
    
    public function inserir(Persistente $persistente){
        $sql = "INSERT INTO atendimento (data) VALUES (:data)";
        return $this->update($sql, $persistente->objectToArray());
    }

    public function atualizar(Persistente $persistente){}
    public function excluir(Persistente $persistente){}
    public function selecionar(Persistente $persistente){}
    public function selecionarTodos(){}

}

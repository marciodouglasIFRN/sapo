<?php

namespace db;
use entidades\Persistente;
use respositorios\IRepositorio;

class AgendamentoRepositorio extends DBMySQL implements IRepositorio {
    public function __construct(){
    }
    
    public function inserir(Persistente $persistente){
        $sql = "INSERT INTO agendamento (id,data,cidadao_id,servico_id) VALUES (:id,:data,:cidadao,:servico)";
        return $this->update($sql, $persistente->objectToArray());
    }

    public function atualizar(Persistente $persistente){
        $sql = "UPDATE `atendimento` SET `data`=:data,`cidadao_id`=:cidadao_id WHERE id = :id";
        return $this->select($sql,$persistente->objectToArray());
    }
    public function excluir(Persistente $persistente){
        //DELETE FROM `atendimento` WHERE 0
    }

    public function selecionar(Persistente $persistente){
        $sql = "SELECT sc.sigla, sc.nome secretaria ,se.nome servico, ag.data FROM 
        `agendamento` ag,`cidadao` cd,`agendamento_cidadao` ac,`servico` se, `secretaria` sc
        WHERE ag.id = ac.agendamento_id and cd.id = ac.cidadao_id and se.id = ag.servico_id and sc.id = se.secretaria_id and cd.cpf = :cpf";
        return $this->select($sql,array("cpf"=> $persistente->getCidadao()->getCpf()));
    }

    public function selecionarTodos(){
        $sql = "SELECT `id`, `data`, `cidadao_id`, `servico_id` FROM `atendimento` WHERE 1";
        return $this->select($sql,array());
    }

}

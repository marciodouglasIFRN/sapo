<?php
namespace fabricas;

use entidades\Agendamento;
use entidades\Persistente;

class AgendamentoFactory implements IEntidadeFactory{

    public function criar($json):Persistente
    {
        $cidadaoFactory = new CidadaoFactory;
        $servicoFactory = new ServicoFactory;
        $id = isset($json['agendamento_id'])?$json['agendamento_id']:null;
        $data = isset($json['agendamento_id'])?$json['agendamento_id']:null;
        $agendamento = new Agendamento($id,"2011-01-01",$cidadaoFactory->criar($json),$servicoFactory->criar($json));
        return $agendamento;
    }
}
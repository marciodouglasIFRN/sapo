<?php
namespace auxiliares;

use DateTime;
use entidades\Agendamento;

class AgendamentoFactory implements IEntidadeFactory{

    public function criar($json){
        $cidadaoFactory = new CidadaoFactory;
        $agendamento = new Agendamento(-1,"2011-01-01",$cidadaoFactory->criar($json));
        return $agendamento;
    }
}
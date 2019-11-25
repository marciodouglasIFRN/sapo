<?php
namespace fabricas;

use entidades\Agendamento;
use entidades\Persistente;

class AgendamentoFactory implements IEntidadeFactory{

    public function criar($json):Persistente
    {
        $cidadaoFactory = new CidadaoFactory;
        $agendamento = new Agendamento(-1,"2011-01-01",$cidadaoFactory->criar($json));
        return $agendamento;
    }
}
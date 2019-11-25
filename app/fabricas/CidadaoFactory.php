<?php
namespace fabricas;

use entidades\Cidadao;
use entidades\Persistente;

class CidadaoFactory implements IEntidadeFactory{
    function criar($json):Persistente
    {
        return new Cidadao(1,'qualquer',$json['cpf']);
    }
}
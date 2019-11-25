<?php
namespace auxiliares;

use entidades\Cidadao;

class CidadaoFactory implements IEntidadeFactory{
    function criar($json)
    {
        return new Cidadao(1,'qualquer',$json['cpf']);
    }
}
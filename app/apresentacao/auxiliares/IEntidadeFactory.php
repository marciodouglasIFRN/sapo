<?php
namespace auxiliares;

use entidades\Persistente;

interface IEntidadeFactory{

    public function criar($json):Persistente;

}
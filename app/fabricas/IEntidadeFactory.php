<?php
namespace fabricas;

use entidades\Persistente;

interface IEntidadeFactory{

    public function criar($json):Persistente;

}
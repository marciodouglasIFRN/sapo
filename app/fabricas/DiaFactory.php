<?php
namespace fabricas;

use entidades\Dia;
use entidades\Persistente;

class DiaFactory implements IEntidadeFactory{
    public function criar($json):Persistente{
        return new Dia(1,'nome');
    }
}
<?php
namespace fabricas;

use entidades\Persistente;
use entidades\Secretaria;

class SecretariaFactory implements IEntidadeFactory{
    
    public function criar($json):Persistente
    {
        return new Secretaria(1,'nome','sigla');
    }
}
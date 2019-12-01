<?php
namespace fabricas;

use entidades\Persistente;
use entidades\Secretaria;

class SecretariaFactory implements IEntidadeFactory{
    
    public function criar($json):Persistente
    {
        $id = isset($json['secretaria_id'])?$json['secretaria_id']:-1;
        return new Secretaria($id,'nome','sigla');
    }
}
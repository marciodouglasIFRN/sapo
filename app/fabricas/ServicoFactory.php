<?php
namespace fabricas;

use entidades\Persistente;
use entidades\Servico;

class ServicoFactory implements IEntidadeFactory{

    public function criar($json):Persistente
    {
        $fabrica = new SecretariaFactory;
        $entidade = $fabrica->criar($json);
        return new Servico(1,'nome',$entidade);
    }
}
<?php
namespace fabricas;

use entidades\Persistente;
use entidades\Servico;

class ServicoFactory implements IEntidadeFactory{

    public function criar($json):Persistente
    {
        $fabrica = new SecretariaFactory;
        $secretaria = $fabrica->criar($json);
        $nome = isset($json['nome'])?$json['nome']:'';
        $id = isset($json['servico_id'])?$json['servico_id']:null;
        return new Servico($id,$nome,$secretaria);
    }
}
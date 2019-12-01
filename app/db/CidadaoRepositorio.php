<?php

namespace db;

class CidadoRepositorio extends DBMySQL {


    public function inserir(Persistente $persistente){
        $sql = "INSERT INTO cidadao (cpf,nome) VALUES (:cpf,:nome)";
        return $this->update($sql, $persistente->objectToArray());
    }

}


?>
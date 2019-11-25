<?php 

namespace entidades;

use entidades\Agendamento;
use entidades\Persistente;


class Cidadao extends Persistente {

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;

    public function __construct(int $identificador,string $nome, string $cpf){
        parent::__construct($identificador);

        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function getCPF() : string {
        return $this->cpf;
    }
    public static function arrayToOBject(array $valores){
        return new self($valores['identidade'],$valores['nome'],$valores['cpf']);
    }

    public function objectToArray() : array{
        return [
            "nome" => $this->nome,
            "cpf" => $this->cpf
        ];
    }

}

?>
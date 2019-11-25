<?php 

namespace entidades;
use entidades\Persistente;

class Secretaria extends Persistente {

    /**
     * @var string
     */
    private $nome;

    /** 
     * @var string
     */
    private $sigla;


    static function arrayToOBject(array $valores) {
        return new self($valores["identificador"], $valores["nome"], $valores["sigla"]);
    }

    public function __construct(int $identificador, string $nome, string $sigla){
        parent::__construct($identificador);

        $this->nome = $nome;
        $this->sigla = $sigla;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function getSigla() : string {
        return $this->sigla;
    }

    public function objectToArray() : array {
        return  [
            'identificador' => $this->identificador,
            'nome' => $this->nome,
            'sigla' => $this->sigla
        ];
    }
}

?>
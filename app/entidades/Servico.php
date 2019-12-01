<?php
namespace entidades;


use entidades\Persistente;

class Servico extends Persistente{

    /**
     * @var string
     */
    private $nome;

    /**
     * @var Secretaria
     */
    private $secretaria;


    public function __construct(int $identificador = null,string $nome,Secretaria $secretaria){
        parent::__construct($identificador);
        $this->nome = $nome;
        $this->secretaria = $secretaria;
    }

    public static function arrayToOBject(array $valores){
        return self($valores['nome'],$valores['secretaria']);
    }

    public function objectToArray() : array{
        return [
            "id"=>$this->identificador,
            "nome" => $this->nome,
            "secretaria"=>$this->secretaria
        ];
    }
    public function getNome(){
        return $this->nome;
    }
    public function getSecretaria(){
        return $this->secretaria;
    }

}
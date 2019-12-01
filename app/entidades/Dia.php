<?php

namespace entidades;

class Dia extends Persistente{
    /**
     * @var string
     */
    private $nome;
    
    public function __construct(int $identificador,string $nome){
        parent::__construct($identificador);
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public static function arrayToOBject(array $valores){
        return new self($valores['id'],$valores['nome']);
    }

    public function objectToArray() : array{
        return [
            'id'=>$this->identificador,
            'nome'=>$this->nome
        ];
    }
}
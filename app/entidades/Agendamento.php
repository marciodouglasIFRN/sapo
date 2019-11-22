<?php
namespace entidades;


use entidades\Persistente;

class Agendamento extends Persistente{

    /**
     * @var string
     */
    private $data;

    /**
     * @var Cidadao
     */
    private $cidadao;

    public function __construct($identificador,$data,$cidadao){
        parent::__construct($identificador);

        $this->data = $data;
        $this->cidadao = $cidadao;
    }

    public static function arrayToOBject(array $valores){
        return self($valore['data'],$valore['cidadao']);
    }

    public function objectToArray() : array{
        return [
            "data" => $this->data,
            "cidadao" => $this->cidadao
        ];
    }
    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getCidadao(){
        return $this->cidadao;
    }

}
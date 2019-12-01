<?php
namespace entidades;


use entidades\Persistente;
use entidades\Cidadao;

class Agendamento extends Persistente{

    /**
     * @var string
     */
    private $data;

    /**
     * @var Cidadao
     */
    private $cidadao;

    /**
     * @var Servico
     */
    private $servico;

    public function __construct(int $identificador = null,string $data,Cidadao $cidadao,Servico $servico){
        if($identificador != null){
            parent::__construct($identificador);
        }
        $this->data = $data;
        $this->cidadao = $cidadao;
        $this->servico = $servico;
    }

    public static function arrayToOBject(array $valores){
        return self($valores['data'],$valores['cidadao']);
    }

    public function objectToArray() : array{
        return [
            "id"=>$this->identificador,
            "data" => $this->data,
            "cidadao" => $this->cidadao->getIdentificador(),
            "servico" => $this->servico->getIdentificador(),
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
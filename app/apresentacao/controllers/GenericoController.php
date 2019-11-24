<?php
abstract class GenericoController{
    
    function criar(){

    }

    function excluir(){

    }

    function consultar(){

    }

    function listar(){

    }

    abstract function atualizar();

    function render($html){
        include "html/".$html.'.html';
    }
}
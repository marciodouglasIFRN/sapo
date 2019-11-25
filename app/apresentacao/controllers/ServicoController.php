<?php

namespace controllers;

use db\ServicoRepositorio;
use fabricas\ServicoFactory;
use GenericoController;

class ServicoController extends GenericoController{
    function __construct()
    {
        parent::__construct(new ServicoRepositorio,new ServicoFactory);
    }

    function atualizar($json)
    {
        
    }
}
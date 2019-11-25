<?php

namespace controllers;

use auxiliares\AgendamentoFactory;
use db\AgendamentoRepositorio;
use GenericoController;

class AgendamentoController extends GenericoController{
    function __construct()
    {
        parent::__construct(new AgendamentoRepositorio, new AgendamentoFactory);
    }

    function atualizar($json)
    {
        
    }
}

<?php
namespace controllers;

use fabricas\SecretariaFactory;
use GenericoController;
use respositorios\SecretariaRepositorio;

class SecretariaController extends GenericoController{
    function __construct()
    {
        parent::__construct(new SecretariaRepositorio,new SecretariaFactory);
    }

    function atualizar($json)
    {
        
    }
}
<?php
namespace controllers;

use db\DiaRepositorio;
use fabricas\DiaFactory;
use GenericoController;

class DiaController extends GenericoController{
    function __construct()
    {
        parent::__construct(new DiaRepositorio,new DiaFactory);
    }
    function atualizar($json)
    {
        
    }
}
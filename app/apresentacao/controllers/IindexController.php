<?php
namespace controllers;

use GenericoController;

class IndexController extends GenericoController{
    function __construct()
    {
        
    }

    function index(){
        $this->render('index');
    }

    function agendados()
    {
        $this->render('agendados');
    }

    function agendar()
    {
        $this->render('agendar');
    }

    function consultar()
    {
        $this->render('consultaragendamento');
    }

    function reagendar()
    {
        $this->render('reagendar');
    }

    function atualizar($json)
    {
        
    }
}
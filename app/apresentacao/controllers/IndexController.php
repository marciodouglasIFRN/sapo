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
        $this->render('agendamento/listar');
    }

    function agendar()
    {
        $this->render('agendamento/criar');
    }

    function consultar()
    {
        $this->render('agendamento/consultar');
    }

    function reagendar()
    {
        $this->render('agendamento/atualizar');
    }

    function atualizar($json)
    {
        
    }
}
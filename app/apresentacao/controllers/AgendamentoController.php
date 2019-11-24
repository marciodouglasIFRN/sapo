<?php

namespace controllers;

use GenericoController;

class AgendamentoController extends GenericoController{
    function agendar()
    {
        $this->render('agendar');
    }
    function consultar()
    {
        $this->render('consultaragendamento');
    }
    function agendados()
    {
        $this->render('agendados');
    }
    function teste($data){
        echo $data;
    }
    function atualizar()
    {
        
    }
}

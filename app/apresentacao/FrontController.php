<?php  

require "../../vendor/autoload.php";
use entidades\Agendamento;
use db\AgendamentoRepositorio;

if (isset($_POST['dt-nascimento'])) {
    $data = $_POST['dt-nascimento'];
    $agendamento = new Agendamento(1,$data,null);
    $agendamentoRepositorio = new AgendamentoRepositorio();
    $agendamentoRepositorio->inserir($agendamento);
}

$rotas = [
    'home' => 'html/index.html',
    'agendar' => 'html/agendar.html',
    'agendados' => 'html/agendados.html',
    'reagendar' => 'html/reagendar.html',
    'consultar' =>  'html/consultaragendamento.html'
];

$rota = 'home';
if (isset($_GET['rota'])) {
    $rota = $_GET['rota'];
}
if(array_key_exists($rota,$rotas)){
    include $rotas[$rota];
}else{
    include 'html/404.html';
}

?>
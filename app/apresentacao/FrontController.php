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


$pagina = 'home';
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
}
#Gerenciar Alunos
if($pagina == 'home') {
	include 'html/index.html';
}elseif($pagina == 'agendar') {
	include 'html/agendar.html';
}elseif ($pagina == 'agendados') {
	include 'html/agendados.html';
}elseif ($pagina == 'reagendar') {
	include 'html/reagendar.html';
}else{
    echo '404';
}

?>
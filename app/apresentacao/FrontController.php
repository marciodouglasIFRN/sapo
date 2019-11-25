<?php  
require "../../vendor/autoload.php";


class FrontController{
    private $routes;

    public function __construct()
    {
        $arquivo = file_get_contents("../rotas.json");
        $this->routes = json_decode($arquivo,true);
        $this->run($this->getURL());
    }

    protected function run($url)
    {
        $prefixo = '/marcio/sapo/app';
        $url = str_replace($prefixo,'',$url);
        $data = explode('/',$url);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $data = $_GET;
        }else{
            $data = $_POST;
        }

        if(array_key_exists($url,$this->routes))
        {
            $class = "controllers\\" . $this->routes[$url]['controller'];
            $controller = new $class;
            $action = $this->routes[$url]['action'];
            $resposta = $controller->$action($data);
            echo $resposta;
        }else{
            include 'html/404.html'; 
        }
    }

    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
}

$route  = new FrontController;




































































































        // var_dump($_SERVER['REQUEST_METHOD'] );
        // if($_SERVER['REQUEST_METHOD'] == 'GET' && count($data)>2){
        //     $data = end($data);
        //     $url = str_replace($data,'{}',$url);
        // }



// use entidades\Agendamento;
// use db\AgendamentoRepositorio;

// if (isset($_POST['dt-nascimento'])) {
//     $data = $_POST['dt-nascimento'];
//     $agendamento = new Agendamento(1,$data,null);
//     $agendamentoRepositorio = new AgendamentoRepositorio();
//     $agendamentoRepositorio->inserir($agendamento);
// }
// $prefixo = '/marcio/sapo/app/';
// $REQUEST_URI = filter_input(INPUT_SERVER,'REQUEST_URI');
// $INITE = strpos($REQUEST_URI,'?');

// if($INITE){
//     $REQUEST_URI = substr($REQUEST_URI,0,$INITE);
// }
// $REQUEST_URI_PASTA = str_replace($prefixo,"",$REQUEST_URI);
// $URI = explode('/',$REQUEST_URI_PASTA);

// $URI[0] = $URI[0] != '' ? $URI[0] : 'home';

// print_r($REQUEST_URI_PASTA);
// $rotas = [
//     'home' => 'html/index.html',
//     'agendar' => 'html/agendar.html',
//     'agendados' => 'html/agendados.html',
//     'reagendar' => 'html/reagendar.html',
//     'consultar' =>  'html/consultaragendamento.html'
// ];

// $rota = 'home';
// if (isset($_GET['rota'])) {
//     $rota = $_GET['rota'];
// }
// if(array_key_exists($rota,$rotas)){
//     include $rotas[$rota];
// }else{
//     include 'html/404.html';
// }

?>
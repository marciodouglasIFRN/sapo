<?php

namespace db;

use entidades\Persistente;
use excecoes\SistemaException;

class DBMySQL{
	
    protected static $db;
    
    private function __construct()
    {
        
        if(!isset(self::$pdo)){

            $db_host = "localhost";
            $db_nome = "bancofpenha";
            $db_usuario = "root";
            $db_senha = "12345";
            $db_driver = "mysql";
            
            try {
                self::$db = new \PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
                self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$db->exec('SET NAMES utf8');

            } catch (PDOException $e) {
                throw new SistemaException ( $e->getMessage(), $e->getCode(), null);
            }
        }
    }


    private static function conexao()
    {
        if (!isset(self::$db)) {
            new DBMySQL();
        }
        
        return self::$db;
    }

    private function query (string $sql, array $dados){
        try {
            $pdo = self::conexao();
            $stmt = $pdo->prepare($sql);
            // print_r($dados);
            $stmt->execute($dados);

            return $stmt;
        } catch (PDOException $e) {
            throw new SistemaException ( $e->getMessage(), $e->getCode(), null);
        }
    }

    protected function update (string $sql, array $dados){
        $stmt = $this->query($sql, $dados);
        return $stmt->rowCount();
    }
    
    protected function select (string $sql, array $dados){
        $stmt = $this->query($sql, $dados);
        return $stmt->fetchAll();
    }

}

 ?>
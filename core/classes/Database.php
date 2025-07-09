<?php

namespace core\classes;

use PDO;
use PDOException;

class Database
{
    private $ligacao;

    // ============================================================================================================
    private function ligar()
    {
        $this->ligacao = new PDO(
            // ligar à base de dados
            "mysql:"."host=".MYSQL_SERVER.";"."dbname=".MYSQL_DATABASE.";"."charset=".MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ============================================================================================================

    private function desligar()
    {
        // desliga-se da base de dados
        $this->ligacao = null;
    }

    // ============================================================================================================
    //                                                  CRUD
    // ============================================================================================================
    public function select($sql, $parametros = null)
    {
        // verificar  se é uma instrução SELECT
        if(!preg_match("/^SELECT/i", $sql)){
            throw new \Exception("Banco de Dados - NÃO é uma instrução SELECT");
        }
        
        // liga
        $this->ligar();

        $resultados = null;

        // comunicar
        try {
            //comunicação com o bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
            else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            //caso exista erro
            return false;
        }

        // desligar
        $this->desligar();

        // devolver os resultados obtidos
        return $resultados;
    }

    // ============================================================================================================
    public function insert($sql, $parametros = null)
    {
        // verificar  se é uma instrução INSERT
        if(!preg_match("/^INSERT/i", $sql)){
            throw new \Exception("Banco de Dados - NÃO é uma instrução INSERT");
        }
        
        // liga
        $this->ligar();

        // comunicar
        try {
            //comunicação com o bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //caso exista erro
            return false;
        }

        // desligar
        $this->desligar();    
    }

    // ============================================================================================================
    public function update($sql, $parametros = null)
    {
        // verificar  se é uma instrução INSERT
        if(!preg_match("/^UPDATE/i", $sql)){
            throw new \Exception("Banco de Dados - NÃO é uma instrução UPDATE");
        }
        
        // liga
        $this->ligar();

        // comunicar
        try {
            //comunicação com o bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //caso exista erro
            return false;
        }

        // desligar
        $this->desligar();    
    }

    // ============================================================================================================
    public function delete($sql, $parametros = null)
    {
        // verificar  se é uma instrução DELETE
        if(!preg_match("/^DELETE/i", $sql)){
            throw new \Exception("Banco de Dados - NÃO é uma instrução DELETE");
        }
        
        // liga
        $this->ligar();

        // comunicar
        try {
            //comunicação com o bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //caso exista erro
            return false;
        }

        // desligar
        $this->desligar();    
    }


    // ============================================================================================================
    //                                                  GENÉRICA
    // ============================================================================================================
    public function statment($sql, $parametros = null)
    {
        // verificar  se é uma instrução diferente das anteriores
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new \Exception("Banco de Dados - instrução inválida");
        }
        
        // liga
        $this->ligar();

        // comunicar
        try {
            //comunicação com o bd
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }
            else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {
            //caso exista erro
            return false;
        }

        // desligar
        $this->desligar();    
    }
}
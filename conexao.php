<?php
/**
 * 
 * @return \PDO
 */

    $dsn = "mysql:host=localhost:3306;dbname=navegador2;charset=utf8";
    $usuario = "remote";
    $senha = "berry2020";
    try {
        $PDO = new PDO($dsn, $usuario, $senha);
        return $PDO;
        //echo "Conexão criada com sucesso!";
    } catch (PDOException $erro) {
        echo "Erro de Conexão " . $erro->getMessage();
    }

<?php
session_start();
include('conexao.php');

if(empty($_POST['matricula']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$matricula = $_POST['matricula'];
$senha = $_POST['senha'];

 $sql = $PDO->prepare("SELECT * FROM usuario WHERE matricula = ?");
 $sql->execute([$matricula]);
		
		if($sql->rowCount() == 1){
			//MATRICULA CORRETA
            $info = $sql->fetch();
			/*
			echo $info['matricula'].'<br>';
			echo 'digitou '.$matricula.'<br>';
			echo $info['senha'].'<br>';
			echo 'digitou '.$senha.'<br>';
			echo $info['nome'].'<br>';
			echo $info['tipo'].'<br>';
			*/
            if(strcmp($senha, $info['senha'])==0){
                //SENHA CORRETA
				
                $_SESSION['tipo'] = $info['tipo'];
                $_SESSION['matricula'] = $info['matricula'];
				$_SESSION['nome'] = $info['nome'];
				//$_SESSION['matricula'] = $matricula;
				
				header('Location: painel.php');
				exit();
            }else{
                //SENHA INCORRETA
                //echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Senha não confere!</p></div>';
				//echo '<a href="index.php"> <button>Temtar novamente...</button></a>';
				$_SESSION['senha_incorreta'] = true;
				header('Location: index.php');
				exit();
            }
        }else{
			//ERRO
			$_SESSION['nao_autenticado'] = true;
			header('Location: index.php');
			exit();
        }
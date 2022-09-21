<?php
include('painel.php');
	$user = $_SESSION['nome'];
	$linha = $_POST['linha'];
	$local = $_POST['local'];
	$eqpto = $_POST['eqpto'];
	$obs = $_POST['obs'];
	//$agora = md5(time());
	$agora = date('Ymd_hms');
	
	if(
		$user 	!= '' &&
		$local 	!= '' &&
		$obs	!= '' &&
		isset($_FILES['arquivo'])
		)
	{

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = $linha.'_'.$eqpto.'_'.$local.'_'.$agora.$extensao; //define o nome do arquivo
    $diretorio = "uploads/".$linha.'/'.$eqpto.'/'; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
	echo '<script>alert("Arquivo '.$novo_nome.' enviado com sucesso!!"); </script>';
  
  
	//echo $novo_nome;
	//$dataArquivo = filemtime($diretorio.$novo_nome);
	$nome = substr($novo_nome,0,-3).'txt';
	$arquivo = fopen($diretorio.$nome,'w');
	//if ($arquivo == false) die('Não foi possível criar o arquivo.');
	
	fwrite ($arquivo, 'Informações do Arquivo'.PHP_EOL);
	fwrite ($arquivo, 'Nome do arquivo: '.$novo_nome.PHP_EOL);
	fwrite ($arquivo, 'Tamanho: '.$_FILES['arquivo']['size'].' bytes'.PHP_EOL);
	fwrite ($arquivo, 'Data do envio: '.date('d/m/Y').PHP_EOL);
	fwrite ($arquivo, 'Enviado por: '.$user.PHP_EOL);
	fwrite ($arquivo, 'Linha: '.$linha.PHP_EOL);
	fwrite ($arquivo, 'Equipamento: '.$eqpto.PHP_EOL);
	fwrite ($arquivo, 'Local: '.$local.PHP_EOL);
	fwrite ($arquivo, 'Observações: '.PHP_EOL);
	fwrite ($arquivo, $obs.PHP_EOL);
		
	fclose($arquivo);
  
	echo "<script>history.go(-2);</script>";
	//include 'arquivo.html';
	//include 'upload.html';
	
	}else
	{
		echo '<script>alert("Obrigatório o preenchimento de todos os campos!!"); </script>';
		echo "<script>history.go(-1);</script>";
	}
?>
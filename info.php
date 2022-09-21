<?php
include('verifica_login.php');
// Abre o Arquvio no Modo r (para leitura)

$info = (array_key_exists('file', $_GET) ? $_GET['file'] : 'uploads/none.txt');
//info.php?file='.$abreDir.substr($arq,0,-3).'txt'.'



if(!file_exists(substr($info,0,-3).'txt')) {
    echo "Arquivo não encontrado!";
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<a href="javascript: history.go(-1)"><button>Voltar</button></a>';
}
else {
    $arquivo = fopen ((substr($info,0,-3).'txt'), 'r');


// Lê o conteúdo do arquivo
while(!feof($arquivo))
{
//Mostra uma linha do arquivo
$linha = fgets($arquivo, 1024);
echo $linha.'<br />';
}

// Fecha arquivo aberto
fclose($arquivo);
echo '<br>';

echo '<a href="javascript: history.go(-1)"><button>Voltar</button></a>';
echo '<a href="'.$info.'"><button>Baixar o Arquivo</button></a>';

	 if(strcmp('ADMINISTRADOR', $_SESSION['nome'])==0){
		echo '<a href="excluir.php?delete='.$info.'"><button>Excluir</button></a>';
	 }

//echo $info;


}
?>
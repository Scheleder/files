<?php

$search = $_POST['word'];
//$search = '*'.$search.'*';

$dir = __DIR__ . '/uploads';

$iterator = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(
      $dir, 
      FilesystemIterator::SKIP_DOTS
  )
);


$array = iterator_to_array($iterator);

ksort($array);

echo'
    <h1 class="mt-5">Resultado da busca:</h1>

';




echo '<table width="600" border="0" cellspacing="2" cellpading="5">';
$trColor='#E5E5E5';
$total = 0;

foreach ($array as $file) {
  if(preg_match("#(.$search.)#i",$file)&&!strpos($file,'.txt')){
	  if($trColor=='E5E5E5'){
			$trColor='F5F5F5';
		}else{
			$trColor='E5E5E5';
		}
			echo '<tr style="background-color:'.$trColor.'">';
			echo '<td>'.basename($file).'</td>';
			//echo '<td align="center"><a href="'.$file.'">baixar</a></td>';
			echo '<td align="center"><a href="http://localhost/arquivo/info.php?file='.strstr($file, "uploads").'">informações</a></td>';
			//http://10.179.60.11:8080/arquivo/info.php?file=uploads/SJP05/DRIVE/SJP05_DRIVE_teste_20210506_030542.jpg
			echo '</tr>';
			$total++;
	}
}  
echo '</table>';
echo '<br>';
if($total == 0){
	echo 'Nenhum arquivo encontrado.';
}
if($total == 1){
	echo 'Único arquivo encontrado.';
}
if($total > 1){
	echo 'Total de '.$total.' arquivos encontrados.';
}
echo '<br>';
echo '<br>';
echo '<a href="painel.php"> <button>voltar</button></a>';


?>
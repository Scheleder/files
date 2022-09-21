<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>

<?php

$baseDir = 'uploads/';
$abreDir = (array_key_exists('dir', $_GET) ? $_GET['dir'] : $baseDir);
$openDir = dir($abreDir);
$strrDir = strrpos(substr($abreDir,0,-1),'/');
$backDir = substr($abreDir,0,$strrDir+1);

echo ' <div class="container">';
echo '<h2 class="mt-5">Gerenciador de arquivos:</h2>';
echo '<table width="100%" border="0" cellspacing="2" cellpading="5">';
$trColor='#E5E5E5';
while($arq = $openDir -> read()):

	if($arq != '.' && $arq != '..' && substr($arq,-3)!= 'txt'):
		if($trColor=='E5E5E5'){
			$trColor='F5F5F5';
		}else{
			$trColor='E5E5E5';
		}
		if(is_dir($abreDir.$arq)){
			echo '<tr style="background-color:'.$trColor.'">';
			echo '<td>'.$arq.'</td>';
			echo '<td align="center"><a href="dir.php?dir='.$abreDir.$arq.'/">abrir pasta</a></td>';
			echo '<td align="center">'.$abreDir.$arq.'</td>';
			echo '</tr>';
		}else{
			echo '<tr style="background-color:'.$trColor.'">';
			echo '<td>'.$arq.'</td>';
			echo '<td align="center"><a href="'.$abreDir.$arq.'">baixar</a></td>';
			echo '<td align="center"><a href="info.php?file='.$abreDir.$arq.'">informações</a></td>';
			//echo '<td align="center"><a href="info.php?file='.$abreDir.substr($arq,0,-3).'txt'.'">informações</a></td>';
			echo '</tr>';
		}
	endif;

endwhile;

echo '</table>';
echo '<br>';
echo '</container>';

if ($abreDir != $baseDir){
	echo '<a href="dir.php?dir='.$backDir.'"> <button>voltar</button></a>';
	
}

$openDir->close();



?>
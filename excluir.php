<?php
$file = $_GET['delete'];
$file2 = substr($file,0,-3).'txt';
//echo $file2;
unlink($file);
unlink($file2);
/* 
	if (!unlink($file)&& !unlink($file2))
	{
		echo '<script>alert("Falha ao excluir o arquivo!!"); </script>';
		//echo "<script>history.go(-1);</script>";
	}
	else
	{*/
		echo '<script>alert("Arquivo '.$file.' excluído com sucesso!!"); </script>';
		echo "<script>history.go(-3);</script>";
	

?>	
<?php
session_start();
if(!$_SESSION['matricula']) {
	header('Location: index.php');
	exit();
}
<?php

$db = new PDO("mysql:host=localhost;dbname=clementina_tcc",'root','root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$password_encrypt = 'ec2}rP&[,g*wGt+k}z$H';

function criptografia ($senha){
	$senha = md5($senha);
	return $senha;
}
<?php
require_once("conecta.php");
require_once("banco-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if ($usuario == null) {
    header("Location: index.php?login=0");
} else {
    header("Location: index.php?login=1");
}
die();
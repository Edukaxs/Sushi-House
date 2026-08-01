<?php

$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "deliverydesushi"
);

if (!$conexao) {
    die("Erro ao conectar.");
}
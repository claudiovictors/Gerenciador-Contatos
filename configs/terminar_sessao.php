<?php
session_start();
global $conn;
include_once "conexao.php";

if(isset($_SESSION['usuario_id'])) {
    session_unset();
    session_destroy();
    header('location: ../login.php');
}
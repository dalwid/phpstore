<?php
use core\classes\Database;
// abrir a sessão
session_start();

// carregar o config
require_once('../config.php');

// carregar todas as classes do projeto
require_once('../vendor/autoload.php');

// carrega as rotas
require_once('../core/rotas.php');
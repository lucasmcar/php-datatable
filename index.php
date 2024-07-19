<?php

/**
 * This a file test to build a datatable
 */

use PhpDataTable\Builder\DataTable;

require 'vendor/autoload.php';


$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$result = [
    
    ['id' => 1, 'nome'=> 'Lucas', 'senha' => '123'],
    ['id' => 2, 'nome'=> 'Lucas 1', 'senha' => '123567'],
    ['id' => 3, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 4, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 5, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 6, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 7, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 8, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 9, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 10, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 11, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 12, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],
    ['id' => 13, 'nome'=> 'Lucas 2 ', 'senha' => '123456'],

];

$table = new DataTable();

//$table->tableCSS("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
$table->setAttributes(['class' => 'table']);
$table->setHeaders(['id', 'nome', 'senha']);
$table->rows($result);

$table->pagination(true, 8);
$table->current($currentPage);

echo $table->render();
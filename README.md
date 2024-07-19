# Simple PHP Datatable library

Hey, i have very happy to announce the development of first version of a simple php datatable lib.

# How to use

Instantiate a object from PHPDatatable

```
<?php 

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$table = new Datatable();

```

The instantiated object can now  to call the necessary methods.
In this example, i'm using bootstrap library to style the table. But you can to use your own style.

```
<?php

$table->tableCSS("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");

$table->setAttrs(['class' => 'table']);

$table->setHeaders(['id', 'nome', 'senha']);

$table->addRows($result);

//Configure the number of rows in table
$table->rowsPerPage(5);

$table->currentPage($currentPage);

//Depending of how you are working with this, you can call the render method with "echo" or "return"
echo $table->render();
```

See, this very very simple.

# Simple PHP Datatable library

Hey! How are you? 

I'm very happy to announce the development of my first lib, 
a first oficial version of a simple php datatable lib with paginator.

# How to use

Is's so very very simple

Instantiate a object from PHPDataTable and from Paginator

```
<?php 

/*
*Exemple of defined number of items per page and the current page
*
/
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 5;

$result = [
    
    ['id' => 1,  'name'=> 'Lucas',      'password' => '123'],
    ['id' => 2,  'name'=> 'Alex',       'password' => '123567'],
    ['id' => 3,  'name'=> 'Peterson',   'password' => '@character'],
    ['id' => 4,  'name'=> 'John',       'password' => 'aletterpass'],
    ['id' => 5,  'name'=> 'Maria',      'password' => '123498'],
    ['id' => 6,  'name'=> 'Anna',       'password' => '12345'],
    ['id' => 7,  'name'=> 'Alisson',    'password' => '123'],
    ['id' => 8,  'name'=> 'George',     'password' => '12345689'],
    ['id' => 9,  'name'=> 'Gabriel',    'password' => '128458'],
    ['id' => 10, 'name'=> 'Rud',        'password' => '45585'],
    ['id' => 11, 'name'=> 'Dexter',     'password' => '125487'],
    ['id' => 12, 'name'=> 'Anna',       'password' => '548255'],
    ['id' => 13, 'name'=> 'Victoria',   'password' => '142565'],

];


$paginator = new Paginator(count($result), $itemsPerPage, $currentPage);
$table = new DataTable();

```

The instantiated object can now  to call the necessary methods.
In this basic example, i'm not using any style.

```
<?php

$table->setAttributes(['id' => 'exampleTable'])
    ->setHeaders(['id', 'name', 'password'])
    ->rows($result)
    ->setPaginator($paginator);  

//Depending of how you are working with this, you can call the render method with "echo" or "return"
echo $table->render();

```

If you want to style your datatable, add to setAttribute method one more item
In this case i'm using a class from bootstrap library, you can set any custom class

```
$table->setAttributes(['id' => 'exampleTable', 'class' => 'table'])
    ->setHeaders(['id', 'nome', 'password'])
    ->rows($result)
    ->setPaginator($paginator);  
```

See, this very very simple.

Feel free to contact me to talk about more features to this lib.

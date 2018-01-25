<?php

namespace App;

error_reporting(E_ALL & ~ E_NOTICE);

define ('WWW_ROOT' , dirname(__FILE__));
define ('DS' , DIRECTORY_SEPARATOR);


require_once ( WWW_ROOT . DS . 'autoload.php');

use Controllers\Controller;

$controller = new Controller();


?>

<!DOCTYPE html>

<!--

.####.##....##..######...########.....###....########..##.....##.####..######...######.
..##..###...##.##....##..##.....##...##.##...##.....##.##.....##..##..##....##.##....##
..##..####..##.##........##.....##..##...##..##.....##.##.....##..##..##.......##......
..##..##.##.##.##...####.########..##.....##.########..#########..##..##........######.
..##..##..####.##....##..##...##...#########.##........##.....##..##..##.............##
..##..##...###.##....##..##....##..##.....##.##........##.....##..##..##....##.##....##
.####.##....##..######...##.....##.##.....##.##........##.....##.####..######...######.

-->

<html lang="pt-br">
    <head>

        <!-- meta data & title -->
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Language" content="Portuguese" />
        <meta name="author" content="Ingraphics - Soluções e Imagens">
        <meta name="reply-to" content="techboard@techboard.com.br" />
        

        <title>TESTE GUEP</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->


    </head>

    <body>

    <!-- Header -->

 

    <section id="teste">

    	<div>
        
	        <div class=" jumbotron">
	            <h1 class="display-3 text-center">Teste Guep</h1>
	        </div>
        
            
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                    <img src="assets/images/logo.png" width="50" height="50" alt="guep" style="margin-top: -16px;"></a>
                </div>    
                <ul class="nav navbar-nav">
                  <li><a class="nav-link" href="index.php?op=home">Home</a></li>
                  <li><a class="nav-link" href="index.php?op=lista-pessoas">Pessoas</a></li> 
                  <li><a class="nav-link" href="index.php?op=lista-grupos">Grupos</a></li> 

                 
                </ul>
              </div>
            </nav>
        

        <?php  
        
        //Inicio da implementação

        $controller->handleRequest();
       
        ?>

    	</div> 
    </section>



    <footer>
        <div class="container">
            <div class="row">
                
                
              
       		</div>
      	</div>
    </footer>


    <div class="text-center">
        <p>&copy; Copyright 2018, <a href="http://ingraphics.com.br/" target="_blank" >Ingraphics Soluções e Imagens</a></p>
    </div>


    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>


  </body>
  </html>
<?php
  
  require __DIR__ . '/vendor/autoload.php';

  use JmesPath\search;

  $json = file_get_contents('carros_2.json');
  $data = json_decode($json , true);

  $q = $_GET['q'];
  //$procura = $_GET['idProcura'];
  
  $expression = "[? id == `$q`]";

  $result = JmesPath\search($expression, $data);

   foreach ($result as $row) {
      foreach($row as $campo => $valor){
          echo '<div>' . $campo . " " . $valor . '</div>';
    }
  } 
echo '<div id="alterar"><input type="submit" value="alterar"></div>';
echo '<div id="excluir"><input type="submit" value="excluir"></div>';
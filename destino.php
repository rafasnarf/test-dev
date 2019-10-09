<html>
<body>
<?php

if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['ano']))
{
  cadastro();
} elseif (isset($_GET)) {
  listar();
};


 function cadastro(){
    $json = file_get_contents('carros.json');
    $data = json_decode($json, true);

    array_push($data, array (
      'id'=>'10'.count($data)+1, 
      'marca' => $_POST['marca'], 
      'modelo' => $_POST['modelo'],  
      'ano' => $_POST['ano'], 
      'created' => date("Y-m-d H:i:s"), 
      'modified' => date("Y-m-d H:i:s")
    ));
    $data = json_encode($data);
    $json = file_put_contents('carros.json', $data);
  }

  function listar(){
    $json = file_get_contents('carros.json');
    $data = json_decode($json , true);


  }
?>  
</body>

</html>

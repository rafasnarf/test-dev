<html>
<body>
<?php

    require __DIR__ . '/vendor/autoload.php';

    use JmesPath\search;

    if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['ano']))
    {
      cadastro();
    } elseif (isset($_GET) && $_GET['idProcura'] == '') 
    {
      listar();
    } elseif (isset($_GET) && $_GET['idProcura'] != '')
    {
      procura();
    };

  function cadastro(){
      $json = file_get_contents('carros.json');
      $data = json_decode($json, true);

     array_push($data, array (
       'id'=> count($data)+1, 
       'marca' => $_POST['marca'], 
       'modelo' => $_POST['modelo'],  
       'ano' => $_POST['ano']
      ));
      $data = json_encode($data);
      $json = file_put_contents('carros.json', $data);
    }

  function listar(){
    $json = file_get_contents('carros.json');
    $data = json_decode($json , true);

    foreach ($data as $row) {
        foreach($row as $campo => $valor){
          echo '<div>' . $campo . " " . $valor . '</div>';
        }
        echo '<div id="alterar">
                <form action="destino.php" method="PUT">
                  <input type="submit" value="alterar">
                </form>
              </div>';
        echo '<div id="excluir">
                <form action="destino.php" method="DELETE">  
                  <input type="submit" value="excluir"> 
                </form>
              </div>';
    }
  }

  function procura(){
  
    $json = file_get_contents('carros.json');
    $data = json_decode($json , true);

    $q = $_GET['idProcura'];
  
    //$procura = $_GET['idProcura'];
    
    $expression = "[? id == `$q`]";
  
    $result = JmesPath\search($expression, $data);

    if($result == null )
    {
        echo "Não há registro com este número de ID";
    } else 
    {
      
        foreach ($result as $row) {
          foreach($row as $campo => $valor){
             echo '<div>' . $campo . " " . $valor . '</div>';
          }
          echo '<div id="alterar">
                <form action="destino.php" method="GET">
                  <input type="submit" value="alterar">
                </form>
              </div>';
          echo '<div id="excluir">
                <form action="destino.php" method="GET">  
                  <input type="submit" value="excluir"> 
                </form>
              </div>';
        }
        
    } 
  }
?>  
</body>

</html>

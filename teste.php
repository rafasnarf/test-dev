<?php
   $json = file_get_contents('carros_2.json');
   $data = json_decode($json, true);
    
   array_push($data, array(
    'id'=>'109', 
    'marca' => 'Fiat' , 
    'modelo' => 'Uno Mile',  
    'ano' => '2000', 
    'created' => date("Y-m-d H:i:s"), 
    'modified' => date("Y-m-d H:i:s")
   ));

   echo json_encode($data);
    
   /*$data = json_encode($data);
   $json = file_put_contents('carros_2.json', $data);
   $json = file_get_contents('carros_2.json');
   $data = json_decode($json, true);

   var_dump($data);*/
?>
<?php
if(isset($_POST['functiontoCall'])) {
  $className = 'Msg';
  $methodName = $_POST['functiontoCall'];
  $class = new $className();
 
  if($methodName=="addMsg")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data);
  }
  elseif($methodName=="updateMsg")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data, $_POST['recordId']);
  }
  elseif($methodName=="delteMsg")
  {
    $class->$methodName($_POST['recordId']);
  }
}

include_once('../includes/dbconfig.php');  
class Msg{

    function addMsg($jsonObj)
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('card/')->push($jsonObj);
    }
    function updateMsg($jsonObj,$recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('card/'.$recordId)->update($jsonObj);
    }
    function delteMsg($recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('printingPersonMsg/'.$recordId)-> remove();
    }
    

    
}
    
?>

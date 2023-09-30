
<?php
if(isset($_POST['functiontoCall'])) {
  $className = 'card';
  $methodName = $_POST['functiontoCall'];
  $class = new $className();
 
  if($methodName=="addCard")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data);
  }
  elseif($methodName=="updateCard")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data, $_POST['recordId']);
  }
  elseif($methodName=="delteCard")
  {
    $class->$methodName($_POST['recordId']);
  }
}

include_once('../includes/dbconfig.php');  
class card{

    function addCard($jsonObj)
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('card/')->push($jsonObj);
    }
    function updateCard($jsonObj,$recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('card/'.$recordId)->update($jsonObj);
    }
    function delteCard($recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('card/'.$recordId)-> remove();
    }
    

    
}
    
?>

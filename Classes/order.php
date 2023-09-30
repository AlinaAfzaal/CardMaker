
<?php
if(isset($_POST['functiontoCall'])) {
  $className = 'order';
  $methodName = $_POST['functiontoCall'];
  $class = new $className();
 
  if($methodName=="addOrder")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data);
  }
  elseif($methodName=="updateOrder")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data, $_POST['recordId']);
  }
  elseif($methodName=="deleteOrder")
  {
    $class->$methodName($_POST['recordId']);
  }
  elseif($methodName=="updateOrderStatus")
  {
    $class->$methodName($_POST['recordId'],$_POST['updatedValue'] );
  }
}

include_once('../includes/dbconfig.php');  
class order{

    function addOrder($jsonObj)
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('orders/')->push($jsonObj);
    }
    function updateOrder($jsonObj,$recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('orders/'.$recordId)->update($jsonObj);
    }
    function deleteOrder($recordId)
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('orders/'.$recordId)->remove();
    }
    
    function updateOrderStatus($recordId, $updatedValue)
    {
      include_once('../includes/dbconfig.php'); 
      $ref = $database->getReference('orders/'.$recordId);
 
      $ref->update(['status'=>$updatedValue]); 
    }
    

    
}
    
?>

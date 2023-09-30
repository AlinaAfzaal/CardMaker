
<?php
if(isset($_POST['functiontoCall'])) {
  $className = 'favCard';
  $methodName = $_POST['functiontoCall'];
  $class = new $className();
 
  if($methodName=="addFavCard")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data);
  }
  elseif($methodName=="updateFavCard")
  { $json = $_POST['json'];
    $data = json_decode($json, true);
    $class->$methodName($data, $_POST['recordId']);
  }
  elseif($methodName=="deleteFavCard")
  {
    $class->$methodName($_POST['recordId'], $_POST['user']);
  }
  elseif($methodName=="isCardFav")
  {
    $class->$methodName($_POST['recordId'], $_POST['user']);
  }
}

include_once('../includes/dbconfig.php');  
class favCard{

    function addFavCard($jsonObj)
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('favCards/')->push($jsonObj);
    }
    function updateFavCard($jsonObj,$recordId )
    {
      include_once('../includes/dbconfig.php');  
      $database->getReference('favCards/'.$recordId)->update($jsonObj);
    }
    function deleteFavCard($recordId,$user )
    {
      include_once('../includes/dbconfig.php');        
      $favcards= $database->getReference('favCards/')->getValue(); 
      if($favcards!=null)
      {      
         foreach ($favcards as $key => $row) {  
          if(($row['user']==$user) && ($row['cardid']==$recordId)) {
            $database->getReference('favCards/'.$key)->remove(); 
          }         
       
        }
      }
    }
    function isCardFav($recordId,$user)
    {
      include_once('../includes/dbconfig.php');        
      $favcards= $database->getReference('favCards/')->getValue(); 
      if($favcards!=null)
      {      
         foreach ($favcards as $key => $row) {  
          if(($row['user']==$user) && ($row['cardid']==$recordId)) {

          }         
       
        }
      }
    }
    
}
    
?>

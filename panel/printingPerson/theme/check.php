<?php 
include_once('../../../includes/dbconfig.php');
session_start(); 
$orders = $database->getReference('orders/')->getSnapshot()->getValue(); 
$count=0; 
foreach ($orders as $key => $value) {
    
if($value['printingPerson']==$_SESSION['email'])
{
    $count = $count + 1; 
}
}
echo $count; 

?>

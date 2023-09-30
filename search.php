<?php
include_once('includes/dbconfig.php');  
if (isset($_GET["card"]) && $_GET["card"] !== '') {
    $query = $database->getReference('customCards')->getValue();
    foreach($query as $col=> $value)
    {
        foreach($value as $c=> $v)
        {
            if($c=='keywords'){
                
                foreach($v as $index=> $keyword)
                {
                    if (strpos(strtolower($keyword), strtolower($_GET["card"])) !== false) {
                        echo '<li style="background:#e7e5e5; border-radius:5px; margin:10px; padding:8px;"><a href="/CardMaker/theme/cardDetail.php?id='.(string)$col.'" style="text-decoration: none; color: black;"><img src="/CardMaker/preparedCards/'.(string)$value["Images"][0].'" style="width:50px; height:50px; border-radius:8px; margin-right:5px;"/>'.(string)$value['title'].'</a></li>';
                    }    
                }
            }
        }
    }

}

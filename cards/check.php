<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
// URL of the page to be shared
$url = "http://localhost/CardMaker/theme/cardDetail.php";

// Message to be shared on WhatsApp
$message = "Check out this page: " . $url;

// WhatsApp sharing link
$whatsapp_link = "https://api.whatsapp.com/send?text=" . urlencode($message);

// Output the WhatsApp sharing link as a button or link
echo '<a href="' . $whatsapp_link . '" data-action="share/whatsapp/share">Share on WhatsApp</a>';
?>

</body>
</html>
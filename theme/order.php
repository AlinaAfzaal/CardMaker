<?php
include_once('../layout/header.php');
include_once('C:\xampp\htdocs\CardMaker\includes\dbconfig.php'); 
$cardArray=""; 
$printingPerson="";
$customer=$_SESSION['email'];
if(isset($_POST['card']))
{
    $cardArray = json_decode($_POST['card']);
    $imageSize=getimagesize($cardArray[0]);
    $printingPerson=$database->getReference('printingPersons/'.$_POST['printingPersonid'])->getValue();
}
elseif(isset($_GET['orderType'])){
    $printingPerson=$database->getReference('printingPersons/'.$_GET['printingPersonid'])->getValue(); 
    // $cardArray =  $database->getReference('premiumCards/'.$_GET['cardid'])->getValue(); 
}

?>
<style>
    input[type="radio"] {
        display: none;
    }

    .form-check-label {
        border-radius: 5px;
        padding: 5px 10px;
        border: 2px solid black;
        background-color: white;
        cursor: pointer;
    }


    input[type="radio"]:checked+.form-check-label {
        border: 2px solid #e03a3c;
    }

    .form-control {
        box-shadow: none;
    }
</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol class="mt-3">
                <li><a href="index.html">Home</a></li>
                <li>Printing Person | Order</li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="product-details" class="product-details">
    <div class="container">
            <div class="row gy-4">

                <div class="col-12 mx-auto">
                    <div class="product-details-slider swiper ">
                        <div class="swiper-wrapper align-items-center m-auto">
                            <?php if(isset($_POST['card'])) 
                            {
                                foreach ($cardArray as $key => $value) {                                
                            ?>

                            <div class="swiper-slide m-auto">
                                <img src="<?php echo $value; ?>" class="align-items-center" alt="CardImage" style="width: <?php echo  $imageSize[0];?>px; height: <?php echo  $imageSize[1];?>px;">
                            </div>

                            <?php }}elseif(isset($_GET['orderType'])) {
                                $cards = $database->getReference('premiumCards/'.$_GET['cardid'])->getChild('CardImages')->getValue();
                                $cardArray = $cards;    
                                foreach($cards as $col=> $value){
                                    foreach($value as $col=> $img){
                                        if($col=="cardUrl"){
                            ?>

                            <div class="swiper-slide m-auto">
                                <img src="<?php echo $img; ?>" class="align-items-center" alt="CardImage" style="width: 250px; height: 300px;">
                            </div>
                            <?php }}}} ?>


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
    </div>
        <div class="container">
            <div class="row gy-4 ">
                <div class="col-lg-8 col-mid-8 col-sm-12 mx-auto">
                    <div class="contact">
                        <form action="#!" method="post" role="form" class="php-email-form">
                            <h4>Card Details <span class="text-danger" id="totalprice"> (Rs: <?php echo $printingPerson['standartPrc']; ?>)</span></h4>
                            <hr>
                            <div class=" ml-4  mb-4">
                                <label for="" class="">Paper</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="paper" id="inlineRadio1" value="offwhite" checked>
                                    <label class="form-check-label" for="inlineRadio1">Off-White</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="paper" id="inlineRadio2" value="textured">
                                    <label class="form-check-label" for="inlineRadio2">Textured</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="paper" id="inlineRadio3" value="pearl">
                                    <label class="form-check-label" for="inlineRadio3">&nbsp;&nbsp;&nbsp;Pearl&nbsp;&nbsp;&nbsp;</label>
                                </div>
                            </div>
                            <div class=" ml-4  mb-4">
                                <label for="" class="">Printing</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="printingSides" id="inlineRadio4" value="singlesided" checked>
                                    <label class="form-check-label" for="inlineRadio4">Single Sided</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="printingSides" id="inlineRadio5" value="doublesided">
                                    <label class="form-check-label" for="inlineRadio5">Double Sided</label>
                                </div>
                            </div>

                            <div class=" ml-4  mb-4">
                                <label for="" class="">Shape</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shape" id="inlineRadio4" value="rounded" checked>
                                    <label class="form-check-label" for="inlineRadio4">Rounded Sided</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shape" id="inlineRadio5" value="square">
                                    <label class="form-check-label" for="inlineRadio5">Square Sided</label>
                                </div>
                            </div>

                            <div  class="ml-4  mb-4">
                                <label for="">No of Cards: </label>
                                <input type="number" placeholder="1" min="0" id="noOfcards" value="1" required>
                            </div>
                            <h4>Shipping Details</h4>
                            <hr> 
                            <label for="">Enter Address: </label>                           
                            <div class="col form-group">
                                <input type="text" class="form-control" id="address"required>
                            </div>
                            <label for="">Enter Phone: </label>                           
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="03456789532" id="phone" minlength="11" required>
                            </div>
                            <label for="">Expected Deliver Date:</label>                           
                            <div class="col form-group">
                                <input type="date" class="form-control" id="deliverdate" required>
                            </div>
                            <br>
                            <button type="button"  id="addOrderBtn" class="get-started-btn ">Order</button><br>
                            <div class="spinner-border text-danger visually-hidden ml-5 mt-3" role="status">
                            </div>
                            <h4 class="visually-hidden  ml-5 mt-3 text-danger" id="msg">Order Placed..</h4>

                        </form>                      
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php
include_once('../layout/footer.php');
?>

<script>

  var totalprice= document.getElementById('totalprice');
  var paperprice =0; 
  var sideprice = 0; 
  var shapeprice = 0; 
  var paper = document.getElementsByName('paper');
  var noOfcards = document.getElementById('noOfcards');
  var no = 1; 
  var printingSides = document.getElementsByName('printingSides');
  var shapes = document.getElementsByName('shape');

  var sidedprc = document.querySelector('input[name="printingSides"]:checked'); 
  sidedprc = sidedprc.value;
  var cardPaper="offwhite"; 
  var cardShape = "rounded"; 
  var cardSides = "singleSided"; 
  var cardNo = "1"; 
 var  discount = 0; 
//   var paper = 

paperprice = "<?php echo $printingPerson['standartPrc'];?>";
for (var i = 0; i < shapes.length; i++) {
    shapes[i].addEventListener('change', function() {
      if (this.checked) {
            if(this.value=="rounded"){
                shapeprice = "50";
            }
            else if(this.value=="square"){
                shapeprice = "60";
            }
            cardSides = this.value; 
            show();
        // console.log(this.value+typeof(paperprice ) );
      }
    });
  }
  for (var i = 0; i < paper.length; i++) {
    paper[i].addEventListener('change', function() {
      if (this.checked) {
            if(this.value=="textured"){
                paperprice = "<?php echo $printingPerson['texturedPrc']; ?>";
            }
            else if(this.value=="pearl"){
                paperprice = "<?php echo $printingPerson['pearlPrc']; ?>";
            }
            else if(this.value=="offwhite"){
                paperprice = "<?php echo $printingPerson['standartPrc'];?>";
            }
            cardPaper = this.value; 
            show();
        // console.log(this.value+typeof(paperprice ) );
      }
    });
  }
  for (var i = 0; i < printingSides.length; i++) {
    printingSides[i].addEventListener('change', function() {
      if (this.checked) {
        if(this.value=="doublesided"){
            sideprice ="-"+"<?php echo $printingPerson['doublePrc']; ?>";
        }
        else if(this.value=="singlesided"){
            sideprice = 0;
        }
        cardSides = this.value; 
        show();

        // console.log(this.value+typeof(sideprice) );
      }
    });
  }
  noOfcards.addEventListener('input', function() {
        no = this.value; 
        cardNo = this.value; 
        if(no>=10)
        {
            discount = 20; 
        show();
        }
        else if(no>=20)
        {
            discount = 40; 
        show();
        }
        else
        {
            showR(); 

        }
  console.log(no+typeof(no));
  });
  function showR()
  {
    console.log(parseInt(parseInt(paperprice) + parseInt(sideprice) * parseInt(no))); 
    totalprice.innerText = parseInt((parseInt(paperprice) + parseInt(sideprice) )* parseInt(no))+shapeprice;
  }

  function show()
  {
    console.log(parseInt(parseInt(paperprice) + parseInt(sideprice) * parseInt(no))); 
    totalprice.innerText = parseInt((parseInt(paperprice) + parseInt(sideprice) )* parseInt(no))+shapeprice;
    if(discount==20)
    {
       var totalvalue = parseInt(totalprice.innerText); 
       var disvalue = totalvalue * 20 / 100; 
       var discountedValue = totalvalue - disvalue;
       console.log("Discout Offer   "+ " Discounted="+ disvalue + "  Price Before Discount="+totalvalue + "  Price After Discount="+discountedValue);    
       totalprice.innerText = "Discout Offer   "+ " Discounted="+ disvalue + "  Price Before Discount="+totalvalue + "  Price After Discount="+discountedValue;
    }
    else if(discount==40)
    {
       var totalvalue = parseInt(totalprice.innerText); 
       var disvalue = totalvalue * 40 / 100; 
       var discountedValue = totalvalue - disvalue;
       console.log("Discout Offer   "+ " Discounted="+ disvalue + "  Price Before Discount="+totalvalue + "  Price After Discount="+discountedValue);    
       totalprice.innerText = "Discout Offer   "+ " Discounted="+ disvalue + "  Price Before Discount="+totalvalue + "  Price After Discount="+discountedValue;  
    }
    else
    {
        totalprice.innerText = parseInt((parseInt(paperprice) + parseInt(sideprice) )* parseInt(no));
    }
    
  }

result = true; 
var address= ""; 
var deliverdate = "";
var phone = "";  
function checkInput() {
    const addressInput = document.getElementById('address'); 
    address = addressInput.value.trim();
    const phoneInput = document.getElementById('phone'); 
    phone = phoneInput.value.trim();
    const deliverdateInput = document.getElementById('deliverdate'); 
    deliverdate = deliverdateInput.value.trim();

    if (!address) { 
        addressInput.focus();
        result = false; 
    }
    else if (!phone) { 
        phoneInput.focus();
        result = false; 
    }
    else if (!deliverdate) { 
        deliverdateInput.focus();
        result = false; 
    }
    else{
        result = true; 
    }

  }
$('#addOrderBtn').on('click', function(){
    checkInput();
if(result==true)
{
    var element = document.querySelector('.spinner-border');
        element.classList.remove("visually-hidden");
        setTimeout(function() {
            element.classList.add("visually-hidden");
            var msg = document.querySelector('#msg');
            msg.classList.remove("visually-hidden");

        }, 4000);
        element.classList.remove("visually-hidden");
console.log("called");
// $date = date();
    var orderJson = {
    "orderType": "<?php if(isset($_POST['orderType'])) echo $_POST['orderType']; if(isset($_GET['orderType'])) echo $_GET['orderType']; ?>",
    "printingPerson": "<?php echo $printingPerson['email'];  ?>",
    "customer": "<?php echo $_SESSION['email']; ?>",
    "address": address,
    "phone": phone,
    "deliverDate": deliverdate, 
    "status": "pending",
    "paper": cardPaper,
    "sides": cardSides,
    "noOfCards": cardNo,
    "totalprice": totalprice.innerText, 
    "cardphoto": '<?php if(isset($_POST['orderType'])){echo $_POST['cardphoto'];} else {echo $_GET['cardid'];}?>',
    "cardURL": '<?php if(isset($_POST['orderType'])) echo implode(',=,', $cardArray); ?>'
}
var jsonString = JSON.stringify(orderJson);
console.log(jsonString);   
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log("success"); 
        console.log(this.responseText);
        window.location = "/CardMaker/theme/myorders.php"; 

    }
};
xmlhttp.open("POST","/CardMaker/Classes/order.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("functiontoCall=addOrder&json=" + jsonString);
}
}); 


</script>
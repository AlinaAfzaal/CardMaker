<?php  session_start(); 
include_once('../includes/dbconfig.php'); 
$cardid =""; 
$cardContainers=""; 
if(isset($_GET['id']))
{
  $cardid = $_GET['id']; 
  $cardContainers = $database->getReference('card/'.$cardid)->getValue(); 
}
$printingPersons = $database->getReference('printingPersons/')->getValue(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Card Maker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@1,300&family=Dancing+Script:wght@600&family=Great+Vibes&family=Rajdhani:wght@700&family=Sofia+Sans+Condensed:ital,wght@1,200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/solid.min.css" integrity="sha512-bdTSJB23zykBjGDvyuZUrLhHD0Rfre0jxTd0/jpTbV7sZL8DCth/88aHX0bq2RV8HK3zx5Qj6r2rRU/Otsjk+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <!-- Favicons -->
  <link href="/CardMaker/assets/img/favicon.png" rel="icon">
  <link href="/CardMaker/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="/CardMaker/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/CardMaker/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/CardMaker/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  
  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

  <style>

.text-overlay {
  position: absolute;
}
.breadcrumbs .controls {
  /* margin-left: 20px; */
  display:inline-flex;
  justify-content: center !important;
  align-items: center !important;

}

.breadcrumbs .controls .input-group{
  /* width: 35px;
  height: 35px; */
  margin-top: 15px;
  margin-right: 10px;
  width: auto;
  display: flex;
  flex-wrap: inherit;
}

.input-group 
{
  background-color: transparent;
  border: none;
  outline: none;
}
.input-group input[type="color"]
{
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: none;
  width: 35px;
  height: 40px;
  cursor: pointer;
  background-color: transparent;

}
#text-color::-webkit-color-swatch
{
  border-radius: 45%;
  border: 1px solid #d1c4c4; 
}
#text-color::-moz-color-swatch
{
  border-radius: 10%;
  border: 1px solid #d1c4c4; 
}
.input-group #font-family
{
    width: 150px;
    height: 40px;
  cursor: pointer;

}
/* ???????????????????????????????????????
.input-group #font-family option:hover
{
  cursor: pointer;

  font-size: 40px;
background-color: rgb(231, 223, 223) !important;
} */
select:focus > option:checked, select:focus > option:hover { 
    background: #d8dbd6 !important;
}
.input-group #text-align
{
    width: 70px;
    height: 40px;
}

input[type="number"]{
    -webkit-moz-appearance: textfield;
    text-align: center;
    height: 40px;
    width: 40px !important;
    font-size: 15px;
    border: none;
    background-color: #ffffff;
    color: #202030;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
    margin: 0;
}
.input-group button{
    width: 25px !important;
    color: #49081893;
    background-color: #ffffff;
    border: none;
    font-size: 25px;
    font-style: bold;
    cursor: pointer;
}
#decrement{
    border-radius: 5px 0 0 5px;
}
#increment{
    border-radius: 0 5px 5px 0;
}

.input-group button i{
  font-size: 15px;
  color: white;
}
.styling button
{
  background-color: transparent;
  margin: 5px;
}



  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex">
      <h1 class="logo me-auto"><a href="/CardMaker/index.php">CardMaker<span>.</span></a></h1>
                <div class="dropdown">
                    <button  type="button"class=" get-started-btn dropdown-toggle" data-toggle="dropdown"><span><i class="fas fa-download"></i></span> </button>
                    <div class="dropdown-menu" style="z-index: 555555555;">
                      <button  type="button"class="dropdown-item" onclick="DownloadCard(true, 'pdf')"> PDF </button>
                      <button  type="button"class="dropdown-item" onclick="DownloadCard(true, 'png')"> PNG </button>
                    </div>
              </div>
                <div class="dropdown mr-5">
                    <button type="button" id="nextBtn"class="get-started-btn dropdown-toggle" data-toggle="dropdown">
                    Next <span><i class="fa-fas-farward"></i></span>
                    </button>
                    <div class="dropdown-menu">
                      <?php 
                      if($cardid!=""){ 
                        ?>
                          <button type="button" class="dropdown-item modalsaveBtn" > Update </button>
                      <?php 
                    }else{
                      ?>
                          <button type="button" class="dropdown-item" data-toggle="modal" data-target="#saveCardModal"> Save </button>
                      <?php 
                    }
                    ?>
                      <button class="dropdown-item dropright-toggle" data-toggle="dropdown" onclick="DownloadCard(false, 'png')">Order </button>
                          <div class="dropdown-menu">
                            <ul class="list-group my-0" style=" max-height: 300px; overflow-y: auto;">
                            <?php if($printingPersons!=null) { foreach ($printingPersons as $key => $value) {

                            

                            ?>
                               <li class="list-group-item  p-2 m-0">
                                    <button class="dropdown-item orderBtn" data-printingPersonemail="<?php echo $value['email']; ?>" data-printingPersonid="<?php echo $key; ?>">
                                      <h4> <?php echo $value['fname'];?></h4>
                                      <h5> SR: <span class="text-danger">(<?php echo $value['standartPrc'];?> Rs.)</span></h5>
                                    </button>
                                </li>
                                <?php }}?>
                            </ul>

                          
                        </div>
                    </div>
                </div>
          

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

          <div class="controls">            
            <div class="input-group">
              <select id="font-family" class="form-control">
                <option selected value="Arial" style="font-family: 'Arial';">Arial</option>
                <option value="Helvetica"  style="font-family: 'Helvetica';">Helvetica</option>
                <option value="Courier New"  style="font-family: 'Courier';">Courier New</option>
                <option value="Verdana"  style="font-family: 'Verdana';">Verdana</option>
                <option value="cursive"  style="font-family:'cursive';">cursive</option>
                <option value="Cambria"  style="font-family:'Cambria';">fantasy</option>
                <option value="Chivo Mono"  style="font-family:'Chivo Mono';">Chivo Mono</option>
                <option value="Dancing Script"  style="font-family:'Dancing Script';">Dancing Script</option>
                <option value="Great Vibes"  style="font-family:'Great Vibes';">Great Vibes</option>
                <option value="Rajdhani"  style="font-family:'Rajdhani';">Rajdhani</option>
                <option value="Sofia Sans Condensed"  style="font-family:'Sofia Sans Condensed';">Sofia Sans Condensed</option>
                <option value="Cambria"  style="font-family:'Cambria';">Cambria</option>
                <option value="Gill Sans Extrabold"  style="font-family:'Gill Sans Extrabold';">Gill Sans Extrabold</option>

              </select>
            </div>
            
            <div class="input-group" style="height:40px;">
              <button id="decrement" onclick="stepper(this)"> &nbsp;-&nbsp; </button>
              <input id="font-size" type="number" class="form-control" value="24" min="8" max="72" step="1"  />
              <button id="increment" onclick="stepper(this)"> + </button>

            </div>
            <div class="input-group colorInput">
              <input type="color" id="text-color" value="#d1c4c4"/>
            </div>
            <div class="input-group" >
              <select id="text-align" class="form-control">
                <option value="left">Left</option>
                <option value="center">Center</option>
                <option value="right">Right</option>
              </select>
            </div>
            <div class="input-group styling">
              <button value="bold" id="bold"><i class="fas fa-bold"></i></button>
              <button value="italic" id="italic"><i class="fas fa-italic"></i></button>
              <button value="uppercase" id="uppercase"><i class="fas fa-up-down"></i></button>
              <button id="rotate-button"><i class="fas fa-rotate"></i></button>
            </div>
          </div>
          
        </div>
    </section>
    <!-- End Breadcrumbs -->



<div class="modal fade" id="saveCardModal" tabindex="-1" aria-labelledby="saveCardModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="saveCardModalLabel">Save Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input  type="text" name="modalcardname" id="modalcardname" placeholder="Enter Card Name here: " style="position: absolute; width: 93%; height: 95%; border: none; outline: none; padding: 5px; ">
      </div>
      
      <div class="spinner-border text-danger m-auto visually-hidden" role="status">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger modalsaveBtn">Save</button>
      </div>
    </div>
  </div>
</div>
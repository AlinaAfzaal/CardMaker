

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Card Maker</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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

  <style>

  .editor {
  width: 450px;
  height: 600px;
  display: flex;
  flex-direction: row;
  margin: auto;
  overflow: hidden;
}
.breadcrumbs
{
  align-items: center;
  justify-content: center;
}
.image-container {
  position: absolute;
  width: 450px;
  height: 600px;
  overflow:hidden;
}
.image-container img
{
  width: 100%;
  height: 100%;
}

.text-overlay {
  position: absolute;
}
.text {
  font-size: 24px;
  color: #000;
  text-align: left;
  font-style: normal;
  z-index: 1;
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
#myImage
{
  object-fit: cover;

}
#myImage:hover
{
  opacity: 0.5;
  cursor: pointer;
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


.editor.rotate {
  transform: rotate(90deg);
  /* width: 450px;
  height: 600px; */
}

.editor.rotate img {
  width: 100%;
  height: 100%;
}

.editor.rotate .text-overlay {
  transform: translate(-50%, -50%) rotate(-90deg);
}


  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex">
      <h1 class="logo me-auto"><a href="/CardMaker/index.php">CardMaker<span>.</span></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li>
                <h5 id="saveBtn" style="cursor: pointer; font-weight: bolder;" name="saveBtn">Save</h5>
            </li>
            <li>
                <div class="dropdown dropright mr-5">
                    <button type="button" class="get-started-btn dropdown-toggle" data-toggle="dropdown">
                    Next <span><i class="fa-fas-farward"></i></span>
                    </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"id="download-jpg">Download as Image&nbsp;&nbsp;&nbsp;</a>
                    <a class="dropdown-item" href="#"id="download-pdf" >Download as PDF</a>
                    <a class="dropdown-item" href="#">Something </a>
                    </div>
                </div>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

          <div class="controls">            
            <div class="input-group">
              <select id="font-family" class="form-control">
                <option value="Arial" style="font-family: 'Arial';">Arial</option>
                <option value="Helvetica"  style="font-family: 'Helvetica';">Helvetica</option>
                <option value="Times New Roman"  style="font-family: 'Times New Roman'">Times New Roman</option>
                <option value="Courier New"  style="font-family: 'Courier';">Courier New</option>
                <option value="Verdana"  style="font-family: 'Verdana';">Verdana</option>
                <option value="Cambria"  style="font-family:'Cambria';">Cambria</option>

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
            </div>
          </div>
          
<button onclick="rotateContainer()">Rotate</button>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- Card Container -->
      <div class="editor mt-1 mb-1" id="editor" >
      <div class="image-container">
        <img id="cardImage"src="CardImages/whitecard.jpg" alt="Example Image" />
        <div class="text-overlay" style="top: 200px; left: 150px;">
          <div class="text"  style=" top: 200px; left: 150px;font-size:24px; font-weight: normal; font-family: Arial; text-align: center" contenteditable>Happy Birthday</div>
        </div>
        <div class="text-overlay" style="top: 250px; left: 120px; " >
          <div class="text" contenteditable style=" top: 250px; left: 120px; font-size:19px; font-weight: normal; font-family: Verdana; text-align: left;">“The day is all yours<br> have fun!”
          </div>
        </div>
        <img src="CardImages/hands.jpg" title="Change Image" id="myImage" class="card-img-overlay overlaidImage" style="width:200px; height:200px; border-radius:50%; top: 320px; left:120px;"/>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="text-center">
        <div class="copyright">
          &copy; Copyright <strong><span>CardMaker</span></strong>. All Rights Reserved
        </div>

      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/CardMaker/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/CardMaker/assets/vendor/aos/aos.js"></script>
  <script src="/CardMaker/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/CardMaker/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/CardMaker/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/CardMaker/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/CardMaker/assets/js/jquery-3.6.0.js"></script>

  <!-- <script src="/CardMaker/assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="/CardMaker/assets/js/main.js"></script>
  <script>
          let selectedText = null;

    $(document).ready(function() {
//======================Getting properties and set toolbar================================




//=======================end==============================================================


//================Apply toolbar css properties============================================

      $('.text').on('click', function() {
        $('.text').removeClass('selected');
        $(this).addClass('selected');
        selectedText = $(this);
      });
      
      $('#text-value').on('input', function() {
        if (selectedText) {
          selectedText.text($(this).val());
        }
      });
      
      $('#text-color').on('input', function() {
        if (selectedText) {
          selectedText.css('color', $(this).val());
          selectedText.setAttribute
        }
      });
      
      $('#text-align').on('change', function() {
        if (selectedText) {
          selectedText.css('text-align', $(this).val());
        }
      });
      
      $('#bold').on('click', function() {
        if (selectedText) {
          selectedText.css('font-weight', 'bolder');
        }
      });

      $('#italic').on('click', function() {
        if (selectedText) {
          selectedText.css('font-style', $(this).val());
        }
      });

      $('#font-family').on('change', function() {
        if (selectedText) {
          selectedText.css('font-family', $(this).val());
        }
      });

      $('#font-size').on('input', function() {
        if (selectedText) {
          selectedText.css('font-size', $(this).val()+"px");
        }
      });

      $('#uppercase').on('click', function() {
        if (selectedText) {
          selectedText.css('text-transform', 'uppercase');
        }
      });
//==================================end=============================================


//============ To Upload Image ==============================
const myImage = document.querySelector('#myImage');
myImage.addEventListener('click', () => {
  const input = document.createElement('input');
  input.type = 'file';
  input.accept = 'image/*';
  input.onchange = (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      myImage.src = reader.result;
    }
  }
  input.click();
});

});




//=================incrementer-decrementer increase font-size=========================
const myInput = document.getElementById("font-size");
function stepper(btn){
    let id = btn.getAttribute("id");
    let min = myInput.getAttribute("min");
    let max = myInput.getAttribute("max");
    let step = myInput.getAttribute("step");
    let val = myInput.getAttribute("value");
    let calcStep = (id == "increment") ? (step*1) : (step * -1);
    let newValue = parseInt(val) + calcStep;

    if(newValue >= min && newValue <= max){
        myInput.setAttribute("value", newValue);   
        myInput.value = newValue;        
         selectedText.css('font-size', newValue+"px");   
    }
}
//=================== saving the data================================

$('#saveBtn').on('click', function(){

  const cardContainer = document.querySelector('#image-container');
const cardImage = document.querySelector('#cardImage');
const overlayImage = document.querySelector('.overlaidImage');
const textOverlays = document.querySelectorAll('.text');

const cardData = {
  "cardImageSrc": cardImage.src,
  "overlayImageSrc": overlayImage.src,
  "textOverlays": []
};

textOverlays.forEach((textOverlay) => {
  const overlayData = {
    "text": textOverlay.innerText,
    "top": parseInt(getComputedStyle(textOverlay).top),
    "left": parseInt(getComputedStyle(textOverlay).left),
    "fontSize": parseInt(getComputedStyle(textOverlay).fontSize),
    "color": getComputedStyle(textOverlay).color,
    "alignment": getComputedStyle(textOverlay).textAlign,
    "bold": getComputedStyle(textOverlay).fontWeight

  };
  cardData.textOverlays.push(overlayData);
});
var jsonString = JSON.stringify(cardData);
console.log(jsonString);

$.ajax({
    type: "POST",
    url: "savecard.php",
    data: { "json": jsonString },
    success: function (response) {
        console.log(response);
    }
}); 


}); 
//=======================Orientatiaon===================================
function rotateContainer() {
  const container = document.querySelector('.editor');
  container.classList.toggle('rotate');
}

//=======================download card================================


</script>


</body>

</html>

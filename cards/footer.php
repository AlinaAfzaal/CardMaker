  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4 ">

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

  <!-- <script src="/CardMaker/assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="/CardMaker/assets/js/main.js"></script>
  <script>
          let selectedText = null;
          var pageName = ""; 

    $(document).ready(function() {

  var currentPage = window.location.pathname;
  pageName = currentPage.split("/").pop();
  console.log(pageName);

//======================Text Rotation ================================================




//=======================Text Rotation end==============================================


//================Apply toolbar css properties============================================

      $('.text').on('click', function() {
        $('.text').removeClass('selected');
        $(this).addClass('selected');
        selectedText = $(this);
        refreshToolbar(); 
          
      });
      
      $('#text-value').on('input', function() {
        if (selectedText) {
          selectedText.text($(this).val());
        }
      });
      
      $('#text-color').on('input', function() {
        if (selectedText) {
          selectedText.css('color', $(this).val());
          // selectedText.setAttribute
        }
      });
      
      $('#text-align').on('change', function() {
        if (selectedText) {
          selectedText.css('text-align', $(this).val());
        }
      });
      
      $('#bold').on('click', function() {
        if (selectedText) {
          var bold=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-weight');
          if(bold==400)
          {
              selectedText.css('font-weight', 'bolder');
              $('#bold').css('background', '#808080');
          }
          else 
          {
            $('#bold').css('background', 'transparent');
            selectedText.css('font-weight', 'normal');

          }
        }
      });

      $('#italic').on('click', function() {
        if (selectedText) {
          var italic=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-style');
          if(italic=='normal')
          {
              selectedText.css('font-style', 'italic');
              $('#italic').css('background', '#808080');
          }
          else 
          {
            $('#italic').css('background', 'transparent');
            selectedText.css('font-style', 'normal');

          }
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
          var uppercase=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('text-transform');
          if(uppercase=='none')
          {
              selectedText.css('text-transform', 'uppercase');
              $('#uppercase').css('background', '#808080');
          }
          else 
          {
            $('#uppercase').css('background', 'transparent');
            selectedText.css('text-transform', 'none');

          }
        }
      });

      let angle = 0;
      $('#rotate-button').on("click", () => {
        angle += 10;
        if (selectedText) {
          selectedText.css('transform', `rotate(${angle}deg)`);
        }
      });
//==================================end=============================================


//============ To Upload Image ==============================
const myImage = document.querySelector('#myImage');
// console.log(myImage); 
if(myImage!=null)
{
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
}
});




//=================incrementer-decrementer increase font-size=========================
function stepper(btn){
  const myInput = document.getElementById("font-size");
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
$('#nextBtn').on('click', function() {
  if('<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>'=='')
  {
    window.location = "/CardMaker/theme/login.php";  
  }
});

$('.modalsaveBtn').on('click', function() {
  if('<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>'=='')
  {
    window.location = "/CardMaker/theme/login.php";  
  }
  saveFunction();
  
  var element = document.querySelector('.spinner-border');
  element.classList.remove("visually-hidden");
  window.location = "/CardMaker/theme/savedCards.php";  

});

function saveFunction()
{
var modalcardname = $("#modalcardname").val();
if(modalcardname=="")
{
  modalcardname="<?php if(isset($_GET['id'])){ echo $cardContainers['modalcardname']; }?>"; 
}
var useremail = "<?php if (isset($_SESSION['email'])) {
                        echo  $_SESSION['email'];}?>"; 
var cardHeight = 0; 
var cardWidth = 0; 
const carousel = document.querySelector('#carouselExampleControls');
const cardContainers = document.querySelectorAll('.image-container');
if(carousel)
{
    var containeractive = carousel.querySelector('.carousel-item.active .editor');
    cardWidth  =containeractive.offsetWidth; 
    cardHeight = containeractive.offsetHeight;   
}
else
{
  cardWidth  = cardContainers[0].offsetWidth; 
  cardHeight = cardContainers[0].offsetHeight; 
}
var CardCont ={
      "useremail":useremail, 
      "modalcardname": modalcardname,
      "date": new Date().toLocaleDateString('en-US'), 
      "cardphoto": "<?php echo $_GET['cardphoto']?>",
      "cards": []
    }; 

cardContainers.forEach((cardContainer) => { 
var cardData=[]; 
const cardImage = cardContainer.querySelector('.cardImage');
const overlayImage = cardContainer.querySelector('.overlaidImage');
const textOverlays = cardContainer.querySelectorAll('.text');
if(overlayImage!=null)
{
    cardData = {
      "containerWidth": cardWidth,
      "containerheight": cardHeight,
      "cardImage": cardImage.src,  
      "cardref": pageName, 
      "overlayImageSrc": overlayImage.src,
      "overlayImagetop": parseInt(getComputedStyle(overlayImage).top),
      "overlayImageleft": parseInt(getComputedStyle(overlayImage).left),
      "overlayImagewidth": overlayImage.offsetWidth,
      "overlayImageheight": overlayImage.offsetHeight,
      "overlayImageradius": window.getComputedStyle(overlayImage).getPropertyValue('border-radius'),
      "textOverlays": []
    };
}
else
{
  cardData = {
      "containerWidth": cardWidth,
      "containerheight": cardHeight,
      "cardImage": cardImage.src, 
      "cardref": pageName, 
      "textOverlays": []
    };
}

textOverlays.forEach((textOverlay) => {
  const overlayData = {
    "text": textOverlay.innerText,
    "top": parseInt(getComputedStyle(textOverlay).top),
    "left": parseInt(getComputedStyle(textOverlay).left),
    "fontSize": parseInt(getComputedStyle(textOverlay).fontSize),
    "texttransform": getComputedStyle(textOverlay).textTransform,
    "angletransform":getComputedStyle(textOverlay).transform,
    "fontstyle": getComputedStyle(textOverlay).fontStyle,
    "color": getComputedStyle(textOverlay).color,
    "fontfamily": getComputedStyle(textOverlay).fontFamily,
    "alignment": getComputedStyle(textOverlay).textAlign,
    "bold": getComputedStyle(textOverlay).fontWeight

  };
  cardData.textOverlays.push(overlayData);
});


CardCont.cards.push(cardData);
console.log(cardData+"\n\n\n\n");
});

var jsonString = JSON.stringify(CardCont);
console.log(jsonString);

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log("success"); 
        console.log(this.responseText);

    }
};
xmlhttp.open("POST","/CardMaker/Classes/card.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
if(pageName!="dynamicCard.php")
{
  xmlhttp.send("functiontoCall=addCard&json=" + jsonString);
}
else
{
  xmlhttp.send("functiontoCall=updateCard&json=" + jsonString+"&recordId=<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>");
}

}
//========================Order Card=================================
CardImagesURL = []; 
// DownloadCard(false);
  var printingPersonemail;
  var printingPersonid;
  var buttons = document.getElementsByClassName('orderBtn');
  for (var i = 0; i < buttons.length; i++) {
    // DownloadCard(false, 'png');
    buttons[i].addEventListener('click', function() {
      printingPersonemail = this.getAttribute('data-printingPersonemail');
      printingPersonid = this.getAttribute('data-printingPersonid');
      console.log(CardImagesURL);
      
      var form = document.createElement("form");
      form.method = "POST";
      form.action = "/CardMaker/theme/order.php";
      var input = document.createElement("input");
      input.type = "hidden";
      input.name = "card";
      input.value = JSON.stringify(CardImagesURL);
      form.appendChild(input);

      var input2 = document.createElement("input");
      input2.type = "hidden";
      input2.name = "printingPersonid";
      input2.value =printingPersonid;
      form.appendChild(input2);

      var input3 = document.createElement("input");
      input3.type = "hidden";
      input3.name = "printingPersonemail";
      input3.value =printingPersonemail;
      form.appendChild(input3);

      var input4 = document.createElement("input");
      input4.type = "hidden";
      input4.name = "orderType";
      input4.value ="customOrder";
      form.appendChild(input4);

      var input5 = document.createElement("input");
      input5.type = "hidden";
      input5.name = "cardphoto";
      input5.value ="<?php if(isset($_GET['cardphoto'])) echo $_GET['cardphoto'];?>";
      form.appendChild(input5);
      
      document.body.appendChild(form);
      form.submit();

    });
  }

//=======================download card================================

function DownloadCard(AreDownloadImage,type)
{
const pdf = new jsPDF();
const carousel = document.querySelector('#carouselExampleControls');

if(carousel)
{
  var items = document.querySelectorAll('.carousel-item');
  const carouselItems = document.querySelectorAll('.editor');
  carouselItems.forEach((cardContainer, index) => { 
    items[index].classList.add('active');
  var elementId = cardContainer.getAttribute("id");
  var editorDiv = document.getElementById(elementId);
  console.log(editorDiv + "  "+ elementId );
  var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");
  var scaleFactor = 1; 
  canvas.width = editorDiv.clientWidth * scaleFactor;
  canvas.height = editorDiv.clientHeight * scaleFactor;
  ctx.scale(scaleFactor, scaleFactor);
  html2canvas(cardContainer, { canvas: canvas, scale: scaleFactor }).then(function() {
    if(AreDownloadImage)
    {
      if(type=='png')
      {
        var link = document.createElement('a');
        link.download = 'card.png';
        link.href = canvas.toDataURL('image/png');
        CardImagesURL.push(canvas.toDataURL('image/png'));
        link.click();
      }
      else if (type=='pdf')
      {
        if(index>0)
        {
          pdf.addPage();
        }
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 10);
          
        if (index==(carouselItems.length-1))
        {
          pdf.save('card.pdf');
        }

      }
      
    }
    else
    {
      var link = document.createElement('a');
      link.download = 'card.png';
      link.href = canvas.toDataURL('image/png');
      CardImagesURL.push(canvas.toDataURL('image/png'));
    }
  });
  });

}
else
{ var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");
  var scaleFactor = 1; 
  var editorDiv = document.getElementById("editor");
  canvas.width = editorDiv.clientWidth * scaleFactor;
  canvas.height = editorDiv.clientHeight * scaleFactor;
  ctx.scale(scaleFactor, scaleFactor);
  html2canvas(editorDiv, { canvas: canvas, scale: scaleFactor }).then(function() {
    if(AreDownloadImage)
    {
      if(type=='png')
      {
        var link = document.createElement('a');
        link.download = 'card.png';
        link.href = canvas.toDataURL('image/png');
        CardImagesURL.push(canvas.toDataURL('image/png'));
        link.click();
      }
      else if (type=='pdf')
      {
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 10);
          pdf.save('card.pdf');

      }
      
    }
    else
    {
      var link = document.createElement('a');
      link.download = 'card.png';
      link.href = canvas.toDataURL('image/png');
      CardImagesURL.push(canvas.toDataURL('image/png'));
    }
  });
  
}   
  }
 
// });
// }
//==================================Toolbar Refresh=========================================
function refreshToolbar()
{
  if(selectedText)
          {
            var size=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-size');
            var fontFamily=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-family');
            var color=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('color');
            var alignment=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('text-align');
            var italic=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-style');
            var uppercase=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('text-transform');
            var bold=  window.getComputedStyle(window.getSelection().focusNode.parentElement).getPropertyValue('font-weight');
            
            $('#font-size').val(parseInt(size));
            var fonts = document.querySelector('#font-size');
            fonts.setAttribute("value", parseInt(size));   


            function rgbToHex(rgb) {
              var hex = Number(rgb).toString(16);
              if (hex.length < 2) {
                hex = "0" + hex;
              }
              return hex;
            }
            var rgbValue = color; 
            var rgbValues = rgbValue.replace(/[^\d,]/g, '').split(',');
            var redValue = rgbValues[0];
            var greenValue = rgbValues[1];
            var blueValue = rgbValues[2];

            var redHex = rgbToHex(redValue);
            var greenHex = rgbToHex(greenValue);
            var blueHex = rgbToHex(blueValue);

            var hexValue = "#" + redHex + greenHex + blueHex;
            $('#text-color').val(hexValue);

            
            if(bold==700)
            {
              $('#bold').css('background', '#808080'); 
            } 
            else
            {
              $('#bold').css('background', 'transparent'); 
            }

            
            if(italic=='italic')
            {
              $('#italic').css('background', '#808080'); 
            }
            else
            {
              $('#italic').css('background', 'transparent'); 
            }
            
            
            if(uppercase=='uppercase')
            {
              $('#uppercase').css('background', '#808080'); 
            }
            else
            {
              $('#uppercase').css('background', 'transparent'); 
            }


            $('#text-align').val(alignment); 
            var newStr = fontFamily.replace(/^"(.*)"$/, '$1');
            $('#font-family').val(newStr);


          }
}


//============================Select and Dragging==========================================
// const container = document.querySelector(".image-container");
// const draggables = document.querySelectorAll(".draggable");



// let activeDraggable = null;
// let initialX = 0;
// let initialY = 0;
// let currentX = 0;
// let currentY = 0;
// let xOffset = 0;
// let yOffset = 0;


// // Add event listeners to draggables
// draggables.forEach((draggable) => {
//   draggable.addEventListener("mousedown", dragStart);
//   draggable.addEventListener("mouseup", dragEnd);
//   draggable.addEventListener("mousemove", drag);
// });

// // Drag functions
// function dragStart(e) {
//   activeDraggable = e.target;
//   initialX = e.clientX - xOffset;
//   initialY = e.clientY - yOffset;  
// }

// function dragEnd(e) {
//   initialX = currentX;
//   initialY = currentY;
//   activeDraggable = null;
// }

// function drag(e) {
//   if (activeDraggable) {
//     e.preventDefault();
//     currentX = e.clientX - initialX;
//     currentY = e.clientY - initialY;
//     xOffset = currentX;
//     yOffset = currentY;
    
//     const containerRect = container.getBoundingClientRect();
//     const draggableRect = activeDraggable.getBoundingClientRect();
//     // console.log(containerRect,draggableRect ); 
    
//     if (currentX < containerRect.left - draggableRect.left) {
//       currentX = containerRect.left - draggableRect.left;
//     }
    
//     if (currentX + draggableRect.width > containerRect.right) {
//       currentX = containerRect.right - draggableRect.width;
//     }
    
//     if (currentY < containerRect.top - draggableRect.top) {
//       currentY = containerRect.top - draggableRect.top;
//     }
    
//     if (currentY + draggableRect.height > containerRect.bottom) {
//       currentY = containerRect.bottom - draggableRect.height;
//     }

//     activeDraggable.style.transform = `translate(${currentX}px, ${currentY}px)`;

//     activeDraggable.style.left =parseInt(getComputedStyle(activeDraggable).left) + xOffset; 
//     activeDraggable.style.top =parseInt(getComputedStyle(activeDraggable).top) + yOffset;  
//        // console.log(e.clientX, e.clientY); 
//     // console.log(parseInt(getComputedStyle(activeDraggable).left), parseInt(getComputedStyle(activeDraggable).top),xOffset, yOffset); 
//   }

  
// }


</script>


</body>

</html>

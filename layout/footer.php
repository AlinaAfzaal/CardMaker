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

  <script>
    $('document').ready(function(){
    // let msgAlert = document.getElementById("msgAlert");
    // setTimeout(function() {
    //     msgAlert.remove();
    // }, 3000);




        var favoriteBtns = document.querySelectorAll(".favHeart");
        favoriteBtns.forEach(function(btn) {
            
            btn.addEventListener("click", function() { 
                var flag = '<?php if(isset( $_SESSION["email"])){echo "true";} else {echo "false"; }?>'; 
                if(flag=='true'){

                var cssProperty = window.getComputedStyle(btn).getPropertyValue("color");
                var id = $(this).data('id');
                var type = $(this).data('type');
                var printingPersonid = $(this).data('ppid');
                console.log(printingPersonid);
                if(cssProperty=="rgb(255, 255, 255)")
                {   console.log("called");
                    console.log(cssProperty);
                    btn.style.color = "red"; 
                    var data=""; 
                    console.log(type);
                    if(type!="custom")
                    {
                        data ={
                            "user":'<?php if(isset( $_SESSION["email"])) echo $_SESSION['email'];?>', 
                            "cardid":id, 
                            "type": type,
                            "printingPersonid": printingPersonid
                        };
                    }
                    else
                    {                       
                        data ={
                            "user":'<?php if(isset( $_SESSION["email"])) echo $_SESSION['email'];?>', 
                            "cardid":id, 
                            "type": type
                        };
                    }
                    var jsonString = JSON.stringify(data);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log("success"); 
                            console.log(this.responseText);

                        }
                    };
                    xmlhttp.open("POST","/CardMaker/Classes/favCards.php", true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("functiontoCall=addFavCard&json=" + jsonString);
                }
                else
                {
                    btn.style.color = "white"; 
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log("success"); 
                            console.log(this.responseText);
                        }
                    };
                    xmlhttp.open("POST","/CardMaker/Classes/favCards.php", true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("functiontoCall=deleteFavCard&recordId=" + id+"&user=<?php if(isset( $_SESSION["email"])) echo $_SESSION['email'];?>");
                }
            }
    else 
    {
        window.location.href = "/CardMaker/theme/login.php";
    }

        }); 
    
        }); 


    }); 
</script>
  <!-- Template Main JS File -->
  <script src="/CardMaker/assets/js/main.js"></script>
</body>
</html>

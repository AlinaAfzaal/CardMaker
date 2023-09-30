<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Saved Cards</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->
    <section class="h-100" style="background-color: #efeef3;">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <h2 class="text-center m-5">Find Your Save Card here!.....</h2>
                            <hr class="my-1">
                        <?php 
                            // $cardIds = $database->getReference('card/')->getChildKeys();
                            $cardContainer = $database->getReference('card/')->getValue(); 
                            if($cardContainer!=null)
                            {

                            
                            foreach ($cardContainer as $key => $row) {  
                                if($row['useremail']==$_SESSION['email']){                      
                            
                        ?>
                            <div class="row g-0">                                
                                <div class="col-lg-12">
                                    <div class="p-5">                    
                                        <div id="cart" class="row mb-4 d-flex px-5 align-items-center">
                                            <div class="col-md-4 col-lg-4 col-xl-4">
                                                <img src="<?php echo '/CardMaker/preparedCards/'.$row['cardphoto']; ?>" class="img-fluid rounded-3" alt="Card Image" style="width: 200px; height: 200px; ">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h3 class="text-danger mb-0"><?php echo $row['modalcardname']?></h3>
                                                <h6 class="text-black mb-0"><?php echo $row['date']?></h6><br>
                                                <a href="/CardMaker/cards/dynamicCard.php?id=<?php  echo $key ?>&cardphoto=<?php echo $row['cardphoto'];?>"> <button class="btn btn-danger">Load </button></a>
                                                <a href="#"><button class="btn btn-danger deleteBtn" title="Delete" data-toggle="modal" data-target="#deletecardModal" data-cardid="<?php echo $key;?>"><i class="fas fa-trash text-white"></i> </button></a>


                                            </div>
                                        </div>
                                        <hr class="my-1">
                                    </div>
                                </div>                                
                            </div>
                        <?php 
                            }}}
                            else
                            {
                                echo '<h5 class="text-center mt-6 mb-6 p-5"> No Card: Saved! </h5> '; 
                            }
                         ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->


</main><!-- End #main -->


        <!-- Modal -->
        <div class="modal fade" id="deletecardModal" tabindex="-1" role="dialog" aria-labelledby="deletecardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deletecardModalLabel">Delete Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <h6> Are You sure to Delete this Card?</h6>
                    </div>
                    <div class="spinner-border text-danger m-auto visually-hidden" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    <div class="modal-footer mt-5">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
                        <button type="button" class="btn btn-danger deleteModalButton"> Yes </button>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once('../layout/footer.php');
?>

<script>
    // element.style.display = "hidden"; 


    $('.deleteModalButton').on('click', function(){
        var element = document.querySelector('.spinner-border');
        element.classList.remove("visually-hidden");
    });
</script>
    
<script>
    
    $(document).ready(function() {
        if (performance.navigation.type == 2) {
  location.reload(true);
}

        var cardid = "";
        $('.deleteBtn').on('click', function() {
            cardid = $(this).data('cardid');
            console.log(cardid);
        }); 
 
        $('.deleteModalButton').on('click', function() {
            //  var loading = document.getElementByClass('loading'); 
            //  loading.style.display = "block"; 
            console.log(cardid);          
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    console.log(this.responseText);
                    location.reload(); 

                }
            };
            xmlhttp.open("POST","/CardMaker/Classes/card.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=delteCard&recordId=" + cardid);

        });
    });

    </script>
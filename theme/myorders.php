<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a>| Cards | Printing Person| </li>
                <li>Orders</li>
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
                            <h2 class="text-center m-5">Find Your Ordered Cards here!.....</h2>
                            <hr class="my-1">
                        <?php 
                            // $cardIds = $database->getReference('card/')->getChildKeys();
                    
                            $orders = $database->getReference('orders/')->getValue(); 
                            if($orders!=null)
                            {

                            
                            foreach ($orders as $key => $row) {  
                                if($row['customer']==$_SESSION['email']){ 
                                    
                            
                        ?>
                            <div class="row g-0">                                
                                <div class="col-lg-12">
                                    <div class="p-5">                    
                                        <div id="cart" class="row mb-4 d-flex px-5 align-items-center">
                                            <div class="col-md-4 col-lg-4 col-xl-4">
                                                <img src="<?php if($row['orderType']=="customOrder") {echo '/CardMaker/preparedCards/'.$row['cardphoto'];}else {$card=$database->getReference('premiumCards/'.$row['cardphoto'])->getValue(); echo $card['CardImages'][0]['cardUrl']; } ?>" class="img-fluid rounded-3"  style="width: 200px; height: 200px; ">
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8">
                                                <h5 class="text-black mb-0"><span class="text-danger">To: </span><?php echo $row['printingPerson']?></h5>
                                                <h6 class="text-black mb-0"><span class="text-danger">Status: </span><?php echo $row['status']?></h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">Sides: </span><?php echo $row['sides']?></h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">Paper: </span><?php echo $row['paper']?></h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">Price: </span><?php echo $row['totalprice']?>Rs.</h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">No of Cards: </span><?php echo $row['noOfCards']?></h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">Address: </span><?php echo $row['address']?></h6>
                                                <h6 class="text-black mb-0"><span class="text-danger">Deliver Date:</span> <?php echo $row['deliverDate']?></h6><br>
                                                <?php if($row['status']=="pending"){?>
                                                <a href="#"><button class="get-started-btn deleteBtn" title="Delete" data-toggle="modal" data-target="#deletecardModal" data-id="<?php echo $key;?>">Cancel Order  <i class="fas fa-times text-white"></i> </button></a>
                                                <?php }else{?>
                                                <span class="text-danger">You can't Cancel Order as Order's status is:  <?php echo $row['status']?></span>
                                                <?php }?>



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
                                echo '<h5 class="text-center mt-6 mb-6 p-5"> No Order Yet </h5> '; 
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
                        <h5 class="modal-title text-danger" id="deletecardModalLabel">Cancel Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <h6> Are You sure to Cancel this Order?</h6>
                    </div>
                    <div class="modal-footer">
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
    $(document).ready(function() {
        if (performance.navigation.type == 2) {
  location.reload(true);
}

        var id = "";
        $('.deleteBtn').on('click', function() {
            id = $(this).data('id');
            console.log(id);
        }); 
 
        $('.deleteModalButton').on('click', function() {
             
            console.log(id);          
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    console.log(this.responseText);
                    location.reload(); 

                }
            };
            xmlhttp.open("POST","/CardMaker/Classes/order.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=deleteOrder&recordId="+id);

        });
    });

    </script>
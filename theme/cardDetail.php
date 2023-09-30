<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
?>
<style>
    a, a:hover{
        text-decoration: none; 
    }
</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Cards</li>
            </ol>
            <h2>Card Details</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="product-details" class="product-details">
        <div class="container">

            <div class="row gy-4">
            <?php 
                if(!isset($_GET['type'])){
                $card= $database->getReference('customCards/'.$_GET['id'])->getValue(); 
                if($card!=null)
                {
                 
            ?>
                <div class="col-lg-8">
                    <div class="product-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <?php 
                                foreach ($card['Images'] as $k => $image) {
                                    $cardphoto =$card['Images'][0]; 
                            ?>
                            <div class="swiper-slide">
                                <img src="/CardMaker/preparedCards/<?php echo $image?>" alt="Image">
                            </div>
                            <?php }?>
                            <!-- <div class="swiper-slide">
                                <img src="/CardMaker/assets/images/card.jpg" alt="">
                            </div> -->


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="product-info">
                        <h3><?php echo $card['title']?> </h3>
                        <ul>
                            <li><strong>Size</strong>:  <?php echo $card['size']?></li>
                            <li><strong>Designed Sides</strong>:  <?php echo $card['designSides']?></li>
                            <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
                        </ul>
                    </div>
                    <div class="product-info">
                        <a href="/CardMaker/cards/<?php echo $card['cardRef'];?>.php?cardphoto=<?php echo $cardphoto; ?>" class="get-started-btn"><i class="fa-solid fa-pen-to-square"></i> Customization &nbsp;&nbsp;&nbsp;&nbsp;</a><br><br>

                    </div>
                </div>
                <?php }} else {
                    $card= $database->getReference('premiumCards/'.$_GET['cardid'])->getValue(); 
                    ?>
                    <div class="col-lg-8">
                        <div class="product-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <?php 
                                foreach($card['CardImages'] as $col=> $value){
                                    foreach($value as $col=> $img){
                                        if($col=="cardUrl"){
                                ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $img; ?>"/>
                                    </div>
                                <?php }}}?>
    
    
    
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                <div class="col-lg-4">
                    <div class="product-info">
                        <h3><?php echo $card['title']?> </h3>
                        <ul>
                            <li><strong>Size</strong>:  <?php echo $card['size']?></li>
                            <li><strong>Designed Sides</strong>:  <?php echo $card['sides']?></li>
                            <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
                        </ul>
                    </div>
                    <div class="product-info">
                        <a href="order.php?orderType=premiumOrder&cardid=<?php echo $_GET['cardid'];?>&printingPersonid=<?php echo $_GET['printingPersonid'];?>" class="get-started-btn">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i> Place Order &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br><br>

                    </div>
                </div>
                <?php }?>


            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php
include_once('../layout/footer.php');
?>
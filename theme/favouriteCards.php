<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol class="align-item-center pt-3">
                <li><a href="/CardMaker/index.php">Home </a></li>
                <li>Favourte Cards</li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Section ======= -->
    <section id="product" class="product">
        <div class="container" data-aos="fade-up">
            <div class="row product-container" data-aos="fade-up" data-aos-delay="200">
            <?php 
                // $cards= $database->getReference('customCards/')->getValue(); 
                // if($cards!=null)
                // {

                
                // foreach ($cards as $key => $row) { 
                    if(isset($_SESSION["email"])){
                        $favcards= $database->getReference('favCards/')->getValue(); 
                        if($favcards!=null)
                        {      
                            foreach ($favcards as $k => $r) {  
                            if(($r['user']==$_SESSION['email'])) {
                                if($r['type']=='custom'){
                                $cards= $database->getReference('customCards/'.$r['cardid'])->getValue(); 
                                $cardkey = $database->getReference('customCards/'.$r['cardid'])->getSnapshot()->getKey();                                 
                            
                        
                ?>
                <div class="col-lg-4 col-md-6 product-item filter-<?php echo $cards['category'];?> filter-<?php echo $cards['subCategory'];?>">
                    <div class="product-wrap">
                        <img src="/CardMaker/preparedCards/<?php echo $cards['Images'][0];?>" class="img-fluid" alt=""style="width: 350px; height: 300px; ">
                        <div class="product-info">
                            <h4><?php  echo $cards['category']; ?> Card</h4>
                            <p><?php echo $cards['subCategory'];?> Card</p>
                            <div class="product-links">
                                <a href="cardDetail.php?id=<?php echo $cardkey;?>" title="Detials"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="#!" class="favBtn" title="Add to Favourite"><i style="color:red;" class="fa fa-heart favHeart" data-id="<?php echo $cardkey; ?>" ></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{
                                $cards= $database->getReference('premiumCards/'.$r['cardid'])->getValue(); 
                                $cardkey = $database->getReference('premiumCards/'.$r['cardid'])->getSnapshot()->getKey();
                    ?>
                <div class="col-lg-4 col-md-6 product-item">
                    <div class="product-wrap">
                        <img src="<?php $cardimg=$database->getReference('premiumCards/'.$r['cardid'])->getValue(); echo $cardimg['CardImages'][0]['cardUrl'];?>" class="img-fluid" alt="Card Image"style="width: 350px; height: 300px; ">
                        <div class="product-info">
                            <h4><?php  echo $cards['title']; ?> Card</h4>
                            <div class="product-links">
                                <a href="/CardMaker/theme/cardDetail.php?cardid=<?php echo $cardkey;?>&type=ppcard&printingPersonid=<?php echo $r['printingPersonid']?>" title="Detials"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="#!" class="favBtn" title="Add to Favourite"><i style="color:red;" class="fa fa-heart favHeart" data-id="<?php echo $cardkey; ?>" ></i></a>
                            </div>
                        </div>
                    </div>
                </div>



            <?php }}}}}else{?>
                    <hr class="text-black">
                        <h4 class="text-black">No Fav Card Yet </h4>
                    <hr>
                <?php }?>


            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

<?php
include_once('../layout/footer.php');
?>

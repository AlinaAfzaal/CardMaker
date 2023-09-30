<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
if(!isset($_SESSION['email']))
{
    header('Location: /CardMaker/theme/login.php'); 
}
$printingPersons = $database->getReference('printingPersons/'.$_GET['printingPersonId'])->getValue(); 
$ppid = $_GET['printingPersonId']; 
if(isset($_POST['msgBtn']))
    {
        $email = $_POST['email']; 
        $msg = $_POST['message']; 
        $name = $_POST['name']; 

        $data = [
            'email'=> $email, 
            'msg'=> $msg,
            'name'=>$name, 
            'printingPersonEmail'=>$printingPersons['email']
        ];

      $database->getReference('printingPersonMsg/')->push($data);        

    }
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="../index.php">Home</a></li>
                <li>printingPerson | Details</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs">
        <div class="container" data-aos="fade-up">


            <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div class="col-lg-8 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <h3><?php echo $printingPersons['shortIntro']; ?></h3>
                            <p class="fst-italic"><?php echo $printingPersons['desc']; ?></p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> <?php echo $printingPersons['reason1']; ?></li>
                                <li><i class="ri-check-double-line"></i><?php echo $printingPersons['reason2']; ?></li>
                                <li><i class="ri-check-double-line"></i> <?php echo $printingPersons['reason3']; ?></li>
                            </ul>

                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="<?php echo $printingPersons['photoUrl']; ?>"style="width:255px; height: 290px; " alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Tabs Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="product" class="product">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>My Designs.</h2>
                <div class="row product-container" data-aos="fade-up" data-aos-delay="200">
                    <?php 
                        $printingPersonsCards = $database->getReference('premiumCards/')->getValue(); 
                        if($printingPersonsCards!=null)
                        {$isCardFav=false;
                            foreach($printingPersonsCards  as $key => $row) { 
                                if($row['email']==$printingPersons['email']){
                                    $favcards= $database->getReference('favCards/')->getValue(); 
                                    if($favcards!=null)
                                    {      
                                        foreach ($favcards as $k => $r) {  
                                        if(($r['user']==$_SESSION['email']) && ($r['cardid']==$key)) {
                                            $isCardFav = true; 
                                        }         
                                        }
                                    }
            

                        
                    ?>

                    <div class="col-lg-4 col-md-6 product-item filter-app">
                        <div class="product-wrap">
                            <img src="<?php echo $row['CardImages'][0]["cardUrl"];  ?>" class="img-fluid" alt="cardImage" style="width: 350px; height: 300px; ">
                            <div class="product-info">
                                <p><?php echo $row['title']?></p>
                                <div class="product-links">
                                    <a href="cardDetail.php?type=ppcard&cardid=<?php echo $key?>&printingPersonid=<?php echo $_GET['printingPersonId']?>" title="Detials"><i class="fa-solid fa-circle-info"></i></a>
                                    <a href="#!"  class="favBtn" title="Add to Favourite"><i <?php if($isCardFav) echo 'style="color:red;"'; ?>class="fa fa-heart favHeart" data-id="<?php echo $key; ?>" data-type="premium" data-ppid="<?php echo $ppid?>"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}}?>



                </div>

            </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p><?php echo $printingPersons['address']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p><?php echo $printingPersons['email']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p><?php echo $printingPersons['phone']; ?></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="#!" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['displayName']; ?>" readonly>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" value=" <?php echo $_SESSION['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Sending...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" id="msgBtn"name="msgBtn">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->


</main><!-- End #main -->


<?php
include_once('../layout/footer.php');
?>
<script>
    $('#msgBtn').on('click', function(){
        setTimeout(function() {
            var elem= document.querySelector('.sent-message');
            elem.style.display = "block"; 

    }, 3000);
            var element = document.querySelector('.loading');
            element.style.display = "block"; 
    });
</script>
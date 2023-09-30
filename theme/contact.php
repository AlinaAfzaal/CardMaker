<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
if(!isset($_SESSION['email']))
{
    header('Location: /CardMaker/theme/login.php'); 
}
?>
<?php
    if(isset($_POST['saveBtn']))
    {
        $email = $_POST['email']; 
        $msg = $_POST['message']; 

        $data = [
            'email'=> $email, 
            'msg'=> $msg
        ];

        $postdata = $database->getReference('contact/')->push($data);        
        if($postdata)
        {
            $_SESSION['status'] = "Thank You (*_*) Your message has been sent";
        }
        else{
            $_SESSION['status'] = "Sorry Something went Wrong Message not Send";
        }
    }
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="../index.php">Home</a></li>
                <li>Contact</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

               
                <div class="col-lg-12">
                <?php 
                    if(isset($_POST['saveBtn']))
                    {
                        echo '<h5 class="alert alert-danger"> '.$_SESSION['status'].'</h5>'; 
                        unset($_SESSION['status']); 
                }?>
                    <form action="#" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'];  ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        
                        <div class="my-3">
                            <div class="loading">Loading</div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-danger" id="msgBtn" name="saveBtn">Send Message</button></div>
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
        var element = document.querySelector('.loading');
        element.style.display = "block"; 
    });
</script>
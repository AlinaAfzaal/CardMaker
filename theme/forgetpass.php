<?php 
ob_start();
include_once('../layout/header.php');
include_once('C:\xampp\htdocs\CardMaker\includes\dbconfig.php');
if(isset($_POST['sendMailBtn']))
{
    $email = $_POST['email']; 
    $auth->sendPasswordResetLink($email);
    $_SESSION['status'] = "Check You Email for Reset Password";  
}
ob_end_flush();?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home | Login </a></li>
                <li>Forget Page</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Forget Password</h2>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12">
                <?php 
                    if(isset($_POST['sendMailBtn']))
                    {
                        echo '<h5 class="alert alert-danger"> '.$_SESSION['status'].'</h5>'; 
                        unset($_SESSION['status']); 
                    }?>
                    <form action="" method="post" role="form" class="php-email-form">
                        <div class="row">
                            
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" name="sendMailBtn">Send Email</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main><!-- End #main --><?php
include_once('../layout/footer.php'); 
?>
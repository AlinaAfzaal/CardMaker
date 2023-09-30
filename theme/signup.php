<?php
ob_start();
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
if(isset($_POST['signupBtn']))
{
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $name = $_POST['name']; 
    $role = $_POST['role']; 

    $useraccount = [
        'email' => $email, 
        'password' => $password,
        'displayName' => $name,
        'role' => $role,
    ];
    try {
        $user = $auth->getUserByEmail($email);
        $_SESSION['status'] = "User with this Email Already Exits"; 
    } catch (UserNotFound $e) {
        $createdUser = $auth->createUser($useraccount);
        if($createdUser)
        {
            $database->getReference('users/')->push($useraccount);
            $_SESSION['status'] = "Signed Up Successfully"; 
        }
        else{
            $_SESSION['status'] = "User not Added Successfully"; 
        }
        exit;
    } catch (\Exception $e) {
        $createdUser = $auth->createUser($useraccount);
        if($createdUser)
        {
            $database->getReference('users/')->push($useraccount);
            $_SESSION['status'] = "Signed Up Successfully"; 
            header('Location: /CardMaker/theme/login.php');
        }
        else{
            $_SESSION['status'] = "User not Added Successfully"; 
        }
        exit;
    }    
}
ob_end_flush();
?><main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Signup Page</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Register</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12">
                <?php 
                    if(isset($_SESSION['status']) && isset($_POST['signupBtn']))
                    {
                        echo '<h5 class="alert alert-success" id="msgAlert"> '.$_SESSION['status'].'</h5>'; 
                        unset($_SESSION['status']); 
                    }?>
                    <form action="" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" minlength="6" required>
                            </div>
                            <div class="form-group">
                                <select name="role" id="" class="form-control fw-light" required>
                                    <option value="" disabled selected>Sign in as:</option>
                                    <option value="customer">Customer</option>
                                    <option value="printingperson">Printing Person</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" name='signupBtn'>Sign up</button></div>
                        <div class="text-center text-danger py-4"> <a href="login.php" class="text-danger">Have an account...Login</a></div>

                    </form>

                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->


</main><!-- End #main -->
<?php
include_once('../layout/footer.php');
?>
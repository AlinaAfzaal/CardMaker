<?php 
ob_start();
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
if(isset($_POST['loginBtn']))
{
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    try {
        $user = $auth->getUserByEmail($email);
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $password);
            $idTokenString =  $signInResult->idToken();

            try { 
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');

                $_SESSION['idTokenString'] = $idTokenString; 
                $_SESSION['verified_user_id'] = $uid;
                // $user = $auth->getUser($uid);
                // $_SESSION['loggedInUser'] = $user->displayName;  
                $_SESSION['status'] = "Logged in Successfully";
                $usersRef = $database->getReference('users');
                $query = $usersRef->orderByChild('email')->equalTo($email);
                $results = $query->getValue();
                $userId = array_key_first($results);
                $user = $results[$userId];
                $_SESSION['displayName'] = $user['displayName']; 
                $_SESSION['role'] = $user['role']; 
                $_SESSION['email'] = $user['email']; 
                header('Location: /CardMaker/');
                exit();  

            } catch (FailedToVerifyToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
                header('Location: /CardMaker/theme/login.php');
            }
        }
        catch(Exception $e)
        { 
            $_SESSION['status'] = "Invalid Password".$e->getMessage();
            header('Location: /CardMaker/theme/login.php');
            exit(); 
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // echo $e->getMessage();
        $_SESSION['status'] = "Invalid Email"; 
        header('Location: /CardMaker/theme/login.php');
        exit(); 
    }
}
ob_end_flush();?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Login Page</li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
                <p>Wellcome to CardMaker</p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12">
                <?php 
                    if(isset($_SESSION['status']))
                    {
                        echo '<h5 class="alert alert-danger" id="msgAlert"> '.$_SESSION['status'].'</h5>'; 
                        unset($_SESSION['status']); 
                    }?>
                    <form action="" method="post" role="form" class="php-email-form">
                        <div class="row">
                            
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                <a href="forgetpass.php"class="text-secondary p-2 m-2" style="text-decoration:none;"><h6>Forget Password</h6></a>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" name="loginBtn">Login</button></div>
                        <div class="text-center text-danger py-4"> <a href="signup.php" class="text-danger">D'ont have account...Sign Up</a></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main><!-- End #main --><?php
include_once('../layout/footer.php'); 
?>
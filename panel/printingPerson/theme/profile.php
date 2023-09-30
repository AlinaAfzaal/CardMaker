<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
$error= "null"; 
$nodeId = "null"; 
$query = $database ->getReference('printingPersons/')->orderByChild('email')->equalTo($_SESSION['email']);
$snapshot = $query->getSnapshot();
foreach ($snapshot->getValue() as $id => $data) {
   $nodeId = $id; 
} 


if(isset($_POST['addbtn'])) {
    $fname = $_POST['fname']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $address = $_POST['address']; 
    $shortIntro = $_POST['shortIntro']; 
    $reason1 = $_POST['reason1']; 
    $reason2 = $_POST['reason2']; 
    $reason3 = $_POST['reason3']; 
    $desc = $_POST['desc']; 
    $standartPrc = $_POST['standartPrc']; 
    $texturedPrc = $_POST['texturedPrc']; 
    $pearlPrc = $_POST['pearlPrc']; 
    $doublePrc = $_POST['doublePrc']; 

    if ($_FILES['photo']['error'] != UPLOAD_ERR_OK) {
        $error = "Show"; 
        $_SESSION['status'] = "You have to choose Profile Image"; 

    }
    else{
    $photo = $_FILES['photo']['tmp_name'];
    $imageName = uniqid(). '.jpg'; 
    $photoUrl = $bucket->upload(
        fopen($photo, 'r'),
        [
            'name' => 'images/'.$imageName,
        ]
    );
    $Url = $photoUrl->signedUrl(new \DateTime('tomorrow'));
    $data = [
        'fname'=> $fname, 
        'email'=> $email, 
        'phone'=> $phone,
        'address'=> $address,
        'shortIntro'=> $shortIntro, 
        'reason1'=> $reason1,
        'reason2'=> $reason2,
        'reason3'=> $reason3,
        'desc'=> $desc,
        'standartPrc'=> $standartPrc,
        'texturedPrc'=> $texturedPrc,
        'pearlPrc'=> $pearlPrc,
        'doublePrc'=> $doublePrc,
        'photoUrl'=> $Url,
        'photoName' => $imageName
 ]; 
 

    if($nodeId=="null")
    { 
        $printingpersonkey = $database->getReference('printingPersons/')->push($data);
        $_SESSION['status'] = "Profile Updated";
    }
    else
    {
        $object = $bucket->object("images/".$database->getReference('printingPersons/'.$nodeId)->getChild('photoName')->getValue());
        $object->delete();
        $database->getReference('printingPersons/'.$nodeId)->update($data);
        $_SESSION['status'] = "Profile Updated";

    }
}}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Profile</h1>
            <div class="row justify-content-center">
                <div class="col-xl-9">
                <?php 
                    if(isset($_POST['addbtn'])|| $error="show" && isset($_SESSION['status']))
                    {
                        echo '<h5 class="alert alert-danger"> '.$_SESSION['status'].'</h5>'; 
                        unset($_SESSION['status']); 
                    }?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text" name="fname" value="<?php echo $_SESSION['displayName']; ?>" readonly />
                                    <label for="inputLastName">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text" name="email"  value="<?php echo $_SESSION['email']; ?>" readonly/>
                                    <label for="inputLastName">Email</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" minlength="11" type="text" name="phone" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('phone')->getValue();?>" required/>
                                    <label for="inputLastName">Phone</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text" name="address" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('address')->getValue();?>" required/>
                                    <label for="inputLastName">Address</label>
                                </div>
                            </div>
                            <?php if($nodeId!="null"){?>
                            <img src="<?php echo $database->getReference('printingPersons/'.$nodeId)->getChild('photoUrl')->getValue(); ?>" style="width: 150px; height: 150px; border-radius: 5px; " class="justify-content-center"required/>
                            <?php }?>
                            <div class="col-md-4 mb-2">
                                <div class="form-floating mr-1 mb-3 mb-md-0">
                                    <!-- <input class="form-control px-4 " id="photo" name="photo" type="file" accept="image/*"/> -->
                                    <input class="form-control px-4 " type="button" id="loadFileXml" value="Choose Profile Photo" onclick="document.getElementById('photo').click();" />
                                    <input class="form-control" id="photo" name="photo" type="file" style="display:none;" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p>
                            __This will be shown and attrack to the Customers__
                        </p>
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="shortIntro" type="text" name="shortIntro" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('shortIntro')->getValue();?>" required/>
                                    <label for="inputPassword">Short Intro</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="reason1" type="text" name="reason1" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('reason1')->getValue();?>" required/>
                                    <label for="inputPassword">Reason1(Why customer order you)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="reason2" type="text" name="reason2" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('reason2')->getValue();?>" required/>
                                    <label for="inputPassword">Reason2</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="reason3" type="text" name="reason3" value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('reason3')->getValue();?>" required/>
                                    <label for="inputPassword">Reason3</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating  mb-md-0">
                                    <input class="form-control" id="desc" type="text" name="desc"value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('desc')->getValue();?>" required/>
                                    <label for="inputPasswordConfirm">Description</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p>
                            __Enter Your Printing Pricing Per Paper __
                        </p>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating  mb-md-0">
                                    <input class="form-control" id="standartPrc" min="0" type="number" name="standartPrc"value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('standartPrc')->getValue();?>" required/>
                                    <label for="inputPasswordConfirm">Standard Price</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating  mb-md-0">
                                    <input class="form-control" id="texturedPrc" min="0" type="number" name="texturedPrc"value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('texturedPrc')->getValue();?>" required/>
                                    <label for="inputPasswordConfirm">Textured Paper Pricing</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating  mb-md-0">
                                    <input class="form-control" id="pearlPrc" min="0" type="number" name="pearlPrc"value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('pearlPrc')->getValue();?>" required/>
                                    <label for="inputPasswordConfirm">Pearl Paper Pricing</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating  mb-md-0">
                                    <input class="form-control" id="doublePrc" min="0" type="number" name="doublePrc"value="<?php if($nodeId!="null") echo $database->getReference('printingPersons/'.$nodeId)->getChild('doublePrc')->getValue();?>" required/>
                                    <label for="inputPasswordConfirm">Double Side Pricing</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><input type="submit" class="btn btn-danger" name="addbtn" value="Save"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>



    <?php
    include_once('../layout/footer.php');
    ?>
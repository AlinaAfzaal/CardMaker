<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
if(isset($_POST['uploadBtn'])) {
       $title = $_POST['title']; 
       $sides = $_POST['sides']; 
       $size = $_POST['size'];
       $CardImages = array(); 

    foreach ($_FILES['cardImages']['tmp_name'] as $key => $tmp_name) {
        $temp_file = $_FILES['cardImages']['tmp_name'][$key];
        $imageName = uniqid(). '.jpg'; 
        $photoUrl = $bucket->upload(
            fopen($temp_file, 'r'),
            [
                'name' => 'PremiumCardImages/'.$imageName,
            ]
        );
        $Url = $photoUrl->signedUrl(new \DateTime('tomorrow'));
        array_push($CardImages, ['cardName'=> $imageName,'cardUrl'=> $Url]);       

    }



       $data = [
        'email' => $_SESSION['email'], 
        'title'=>  $title,
        'sides'=>  $sides,
        'size'=>  $size,
        'CardImages' =>$CardImages
    ]; 

    $results = $database->getReference('premiumCards/')->push($data);
    if( $results)
    {
        header("Location: /CardMaker/panel/printingPerson/theme/myCards.php"); 
    }
}
?>



<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">My Cards</h1>
        </div>

        <button class="btn btn-danger m-2" title="Reply" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Card</button>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Size</th>
                            <th>Designed Sides</th>
                            <th> Action </th> 
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $premiumCards = $database->getReference('premiumCards/')->getValue(); 
                            if($premiumCards!=null)
                            {

                            foreach ($premiumCards as $key => $row) { 
                                 
                                if($row['email']==$_SESSION['email']){
                         ?>
                                <tr>
                                    <td><img src="<?php echo $row['CardImages'][0]['cardUrl'];?>" width="50px" height="50px"></td>
                                    <td> <?php echo $row['title'];  ?> </td>
                                    <td><?php echo $row['size'];  ?></td>
                                    <td><?php echo $row['sides'];  ?></td>
                                    <td>
                                        <button style="border:none; outline:none; background:none;" title="Delete" name="deleteBtn" class="deleteButton" data-id="<?php echo $key; ?>"data-toggle="modal" data-target="#deletecardModal">
                                            <i class="fas fa-trash btn btn-danger "></i>
                                        </button>   
                                    </td>
                                </tr>
                        <?php
                                }
                             }}
                        ?>
                         </tbody>
                </table>
            </div>
        </div>


        <div id="exampleModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Card</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Title" name="title" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Size"name="size" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Sides" name="sides" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="cardImages[]" id="" multiple>
                            </div>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-danger" type="submit" name="uploadBtn">Upload</button>
                            </div>
                            </form>
                </div>

            </div>
        </div>



        
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

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
                        <button type="button" class="btn btn-danger deleteModalButton"> Yes </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('../layout/footer.php');
    ?>
    
    <script>
    $(document).ready(function() {
        var userid = ""; 
        var email=""; 
        $('.deleteButton').on('click', function() {
            cardid = $(this).data('id');
            $(this).closest('tr').hide();
        });
        
        $('.deleteModalButton').on('click', function() {
        var element = document.querySelector('.spinner-border');
        element.classList.remove("visually-hidden");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    console.log(this.responseText);
                    location.reload(); 
                }
            };
            xmlhttp.open("GET","myCards.php?cardid="+cardid, true);
            xmlhttp.send();

        });
    });

    </script>

    
<?php
    if(isset($_GET['cardid']))
    {
        $id = $_GET['cardid'];
        $cards = $database->getReference('premiumCards/'.$id)->getChild('CardImages')->getValue(); 
        foreach($cards as $key => $row)
        {
            foreach($row as $key => $value)
            {
               if($key == "cardName")
               {                    
                    $object = $bucket->object("PremiumCardImages/".$value);
                    $object->delete();     
               }
            }
        }
        $database->getReference('premiumCards/'.$id)->remove();

        
    }
?>
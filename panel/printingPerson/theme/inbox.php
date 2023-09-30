<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
?>
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Inbox</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $printingPersonMsg = $database->getReference('printingPersonMsg/')->getValue(); 
                            if($printingPersonMsg!=null)
                            {

                            foreach ($printingPersonMsg as $key => $row) { 
                                 
                                if($row['printingPersonEmail']==$_SESSION['email']){

                    ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['msg']; ?></td>
                            <td>
                                <button style="border:none; outline:none; background:none;" title="Delete" data-id="<?php echo $key;?>" class="deleteButton"data-toggle="modal" data-target="#deletecardModal">
                                    <i class="fas fa-trash btn btn-danger "></i>
                                </button>
                            </td>
                        </tr>
                        <?php }}} ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deletecardModal" tabindex="-1" role="dialog" aria-labelledby="deletecardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deletecardModalLabel">Delete Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <h6> Are You sure to Delete this Message?</h6>
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
        var msgid = ""; 
        $('.deleteButton').on('click', function() {
            msgid = $(this).data('id');
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
            xmlhttp.open("POST","/CardMaker/Classes/Messages.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=delteMsg&recordId=" + msgid);

        });
        });

    </script>
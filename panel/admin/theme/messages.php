<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
 if(isset($_POST['delete'])) {
       $recordId = $_POST['msgId'];
       $result =  $database->getReference('contact/' . $recordId)->remove();

}
if(isset($_POST['addBtn'])) {
       $question = $_POST['question']; 
       $answer = $_POST['answer']; 
       $data = [
        'question' => $question ,
        'answer'=>  $answer,
    ]; 
       $database->getReference('faqs/')->push($data);
    echo "<script> console.log('entered');</script>"; 
}
?>
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Messages</h1>
            <div class="spinner-border text-danger m-auto visually-hidden " role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Message</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = $database->getReference('contact/')->getValue(); 
                            if($users!=null)
                            {

                            
                            foreach ($users as $key => $row) {  
                         ?>
                        <tr>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['msg']; ?></td>
                            <td>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                                    <input type="hidden" name="msgId" value="<?php echo $key; ?>"> 
                                    <button style="border:none; outline:none; background:none;" class="deleteModalButton"title="Delete" name="delete" type="submit">
                                        <i class="fas fa-trash btn btn-danger "></i>
                                    </button> 
                                    <button style="border:none; outline:none; background:none;" data-msg="<?php echo $row['msg']; ?>" title="Reply" data-toggle="modal" data-target="#myModal" name="addtoFAQ" type="button" class="AddFAQsBtn">
                                        <i class="fas fa-star btn btn-secondary "></i>
                                    </button>
                                    </form> 

                                 
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Message to FAQs</h4>
                </div>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" id="question" name="question">
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer:</label>
                            <input type="text" class="form-control" name="answer" id="answer"required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" name="addBtn" type="submit" id="addBtn">Add</button>
                    <button type="button" class="btn btn-danger hideBtn" data-dismiss="modal">Close</button>
                </div>
                </form>

            </div>

        </div>
    </div>

    <?php
    include_once('../layout/footer.php');
?>
<script>
        $(document).ready(function() {
            $(".editBtn").click(function() {
                $("#myModal").modal("toggle");
            });
            $(".hideBtn").click(function() {
                $("#myModal").modal("hide");
            });

            $('.AddFAQsBtn').on('click', function() {
                var msg = $(this).data('msg');
                $('#question').val(msg);

                $('#myModal').modal('show');
             });
            // $('.deleteModalButton').on('click', function(){
            //     setTimeout(function() {
            //         var element = document.querySelector('.spinner-border');
            //         element.classList.remove("visually-hidden");
            //     }, 4000);

            // });
        });
    </script>

<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
?>
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $users = $database->getReference('users/')->getValue(); 
                            if($users!=null)
                            {                           
                            foreach ($users as $key => $row) {  
                                if($row['role']!="admin"){
                         ?>
                        <tr>
                            <td><?php echo $row['displayName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
                                <button style="border:none; outline:none; background:none;" title="Delete" name="deleteBtn" class="deleteBtn" data-id="<?php echo $key; ?>" data-email="<?php echo $row['email']; ?>">
                                    <i class="fas fa-trash btn btn-danger "></i>
                                </button>   
                            </td>
                        </tr>
                        <?php }} }?>
                    </tbody>
                </table>
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
        $('.deleteBtn').on('click', function() {
            userid = $(this).data('id');
            email = $(this).data('email');            
        });

        $('.deleteBtn').on('click', function() {
            $(this).closest('tr').hide();
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                    } else {
                        console.error('falied');
                    }
                }
            };
            xhr.open('GET', 'users.php?userid='+userid+'&email='+email, true);
            xhr.send();
        });
    });

    </script>

<?php
    if(isset($_GET['userid']))
    {
        $id = $_GET['userid'];
        $database->getReference('users/'.$id)->remove();
        $user = $auth->getUserByEmail($_GET['email']);
        $auth->deleteUser($user->uid);
        // $auth->revokeRefreshTokens($user->uid);



        // // $auth->deleteUser($_SESSION['verified_user_id']);
        // try {
        //     // Delete the user from Firebase
        //     $auth->deleteUser($_SESSION['verified_user_id']);
        
        //     // User deleted successfully
        //     echo "<script> console.log('User deleted successfully!'); </script>";
        // } catch (\Firebase\Auth\Error\UserNotFound $e) {
        //     // User not found
        //     echo "<script> console.log('User not found'); </script>";
        // } catch (Exception $e) {
        //     // Other errors
        //     echo "<script> console.log('User deleted successfully!". $e->getMessage(). "')</script>";
        // }
    }
?>
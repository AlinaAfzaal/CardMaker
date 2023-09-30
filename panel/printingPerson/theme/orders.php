<?php
include_once('../layout/header.php');
include_once('../../../includes/dbconfig.php');
?>
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Orders</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Paper</th>
                            <th>Sides</th>
                            <th>Qnty</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $orders = $database->getReference('orders/')->getValue(); 
                                if($orders!=null)
                                {
                                   foreach ($orders as $key => $row) {                             
                                    if($row['printingPerson']==$_SESSION['email']){
                        
                        ?>
                        <tr>
                            <td><img src="<?php if($row['orderType']=='premiumOrder'){$card=$database->getReference('premiumCards/'.$row['cardphoto'])->getValue(); echo $card['CardImages'][0]['cardUrl'];} else{echo '/CardMaker/preparedCards/'.$row['cardphoto']; }?>" style="width:50px;height:50px;" /></td>
                            <td><?php echo $row['paper'];?></td>
                            <td><?php echo $row['sides'];?></td>
                            <td><?php echo $row['noOfCards'];?></td>
                            <td><?php echo $row['deliverDate'];?></td>
                            <td><?php echo $row['totalprice'];?> Rs</td>
                            <td><?php echo $row['customer'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['address'];?></td>                          
                            <td>
                            <?php if($row['orderType']=='customOrder'){?> <button class="btn btn-secondary m-1 detailsBtn" name="detailsBtn"><a style="text-decoration:none; color:white;"><i class="fas fa-download" title="Download Card"></i></a></button><?php }?>
                                <?php if($row['status']=="pending"){ ?>
                                <button class="btn btn-secondary m-1 acceptBtn"id="acceptBtn-<?php echo $key;?>" onclick="acceptOrder(this, '<?php echo $key;?>')"><i class="fas fa-check" title="Accept Order"></i></button>
                                <button class="btn btn-danger m-1 " id="rejectBtn-<?php echo $key;?>" onclick="rejectOrder(this, '<?php echo $key;?>')"><i class="fas fa-times" title="Reject Order"></i> </button>
                                
                                <select style="display:none; width: 150px;" class="form-select"id ="status-<?php echo $key;?>">
                                    <option value="accept" selected>Accepted</option>
                                    <option value="start">Work Started</option>
                                    <option value="working50">working-50%</option>
                                    <option value="working80">working-80%</option>
                                    <option value="complete">Completed</option>
                                </select>
                                <?php }else{?>
                                <select style="display:block;width: 150px;" class="form-select"id ="status-<?php echo $key;?>" onchange="updateOrderStatus(this, '<?php echo $key;?>')">
                                    <option value="accepted"<?php if($row['status']=="accepted") echo "selected";?>>Accepted</option>
                                    <option value="started"<?php if($row['status']=="started") echo "selected";?>>Work Started</option>
                                    <option value="working50"<?php if($row['status']=="working50") echo "selected";?>>working-50%</option>
                                    <option value="working80"<?php if($row['status']=="wording80") echo "selected";?>>working-80%</option>
                                    <option value="completed"<?php if($row['status']=="completed") echo "selected";?>>Completed</option>
                                </select>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php }}}?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <?php
    include_once('../layout/footer.php');
    ?>

    <script>


        function acceptOrder(btn, id)
        {
            btn.style.display = "none"; 
            var rejectBtn = document.querySelector('#rejectBtn-'+id);
            rejectBtn.style.display = "none";
            var status = document.querySelector('#status-'+id);
            status.style.display = "block";

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    $(this).closest('tr').hide();
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/CardMaker/Classes/order.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=updateOrderStatus&recordId=" + id+"&updatedValue="+status.value);


        }
        function rejectOrder(btn, id)
        {
            btn.style.display = "none"; 
            var acceptBtn = document.querySelector('#acceptBtn-'+id);
            acceptBtn.style.display = "none";
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/CardMaker/Classes/order.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=deleteOrder&recordId=" + id);
        }
        
        function updateOrderStatus(select, id)
        {
            const selectElement = document.getElementById('status-'+id);
            const selectedValue = selectElement.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success"); 
                    console.log(this.responseText);
                }
            };
            xmlhttp.open("POST","/CardMaker/Classes/order.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("functiontoCall=updateOrderStatus&recordId=" + id+"&updatedValue="+selectedValue);
        }
        

    </script>
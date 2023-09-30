<?php 
include_once('C:\xampp\htdocs\CardMaker\includes\dbconfig.php');
?>
<div id="layoutSidenav_content">
    <main> 
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <hr>
            <div class="row">
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Total Orders (<?php $orders = $database->getReference('orders/')->getSnapshot()->getValue(); $count=0; if($orders!=null){foreach ($orders as $key => $value) {if($value['printingPerson']==$_SESSION['email']){$count = $count + 1;}}} echo $count;  ?>)</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/CardMaker/panel/printingPerson/theme/orders.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Pending Orders (<?php $orders = $database->getReference('orders/')->getSnapshot()->getValue(); $count=0; if($orders!=null){foreach ($orders as $key => $value) {if($value['printingPerson']==$_SESSION['email']&&$value['status']=="pending"){$count = $count + 1;}}} echo $count;  ?>)</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/CardMaker/panel/printingPerson/theme/orders.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Messages (<?php $orders = $database->getReference('printingPersonMsg/')->getSnapshot()->getValue(); $count=0; if($orders!=null){foreach ($orders as $key => $value) {if($value['printingPersonEmail']==$_SESSION['email']){$count = $count + 1;}}} echo $count;  ?>)</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/CardMaker/panel/printingPerson/theme/inbox.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div> -->


    </main>
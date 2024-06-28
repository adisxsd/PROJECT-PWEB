<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="app\assets\css\admin.css"></link>
  </head>
</head>
<body >
    
    
        <?php
            include_once __DIR__ ."/adminHeader.php";
            include_once __DIR__ ."/sidebar.php";
            include_once __DIR__ . "/../../models/admin/adminmodel.php";

            $total_customer = totaldata::getTotalCustomers();
            $total_order = totaldata::getTotalOrders();
            $total_paket = totaldata::getTotalPackage();
           
        ?>
        <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users</h4>
                    <h5 style="color:white;">
                    <?php
                    echo $total_customer;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Paket</h4>
                    <h5 style="color:white;">
                    <?php
                    echo $total_paket;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Orders</h4>
                    <h5 style="color:white;">
                    <?php
                    echo $total_order;
                   ?>
                   </h5>
            </div>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";  
        document.getElementById("main-content").style.marginLeft = "250px";
        document.getElementById("main").style.display="none";
        document.getElementById("homeofshoe").style.display="none";
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";  
        document.getElementById("main").style.display="block";
        document.getElementById("homeofshoe").style.display="block";  
        }
    </script>
</body>

</html>
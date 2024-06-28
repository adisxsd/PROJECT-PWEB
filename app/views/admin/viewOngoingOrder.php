<?php
// Include the database connection and AdminModel.php
include_once __DIR__ ."/adminHeader.php";
include_once __DIR__ ."/sidebar.php";
include_once __DIR__ . "/../../models/admin/adminmodel.php";

// Get all Paket Cuci data using the static method
$order = AdminModel::getOnGoingOrder();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="app\assets\css\paket.css"></link>
</head>
<body>
    <div id="main-content" class="container allContent-section py-4">
        <h2 style="color:white">On Going Order List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">id_transaksi</th>
                    <th class="text-center">Customers</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Alamat Delivery</th>
                    <th class="text-center">Paket Cuci</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Merk</th>
                    <th class="text-center">Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $index => $order) : ?>
                    <tr>
                        <td class="text-center"><?php echo $order['transaksi_id'] ?></td>
                        <td class="text-center"><?php echo $order['customer_name']; ?></td>
                        <td class="text-center"><?php echo $order['tanggal_transaksi']; ?></td>
                        <td class="text-center"><?php echo $order['alamat_delivery']; ?></td>
                        <td class="text-center"><?php echo $order['paket_cuci_name']; ?></td>
                        <td class="text-center"><?php echo $order['size']; ?></td>
                        <td class="text-center"><?php echo $order['merk_name']; ?></td>
                        <td class="text-center">
                        <form action="?action=updateOrderStatus" method="post">
                            <input type="hidden" name="transaksi_id" value="<?php echo $order['transaksi_id']; ?>">
                                <select class="form_select" id="status" name="status_id" required>
                                    <option value="" selected disabled ><?php echo $order['status_name']; ?></option>
                                    <?php
                                    $statusPesananData = AdminModel::getStatusPesanan();
                                    foreach ($statusPesananData as $status) {
                                    ?>
                                        <option value="<?= $status['status_id']; ?>"><?= $status['nama_status']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </br>
                                <button type="submit" class="btn Status" onclick="return confirm('Are you sure you want to update the status?')">Update Status</button>
                        </form>
                        </td>
                        
                        

                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?action=vieworders" class="button-edit">Show All</a>
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
        document.getElementById("main").style.marginLeft= "20px";
        document.getElementById("main-content").style.marginLeft= "150px";  
        document.getElementById("main").style.display="block";
        document.getElementById("homeofshoe").style.display="block";  
        }
    </script>

</body>
</html>

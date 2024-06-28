<?php
// Include the database connection and AdminModel.php
include_once __DIR__ ."/adminHeader.php";
include_once __DIR__ ."/sidebar.php";
include_once __DIR__ . "/../../models/admin/adminmodel.php";

$perPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Get paginated customer data using the static method
$customerdetails = AdminModel::getPaginatedCustomers($page, $perPage);

// Additional logic for getting total pages
$totalCustomers = totaldata::getTotalCustomers(); // Implement this method in your model
$totalPages = ceil($totalCustomers / $perPage);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="app\assets\css\paket.css"></link>
       <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
    <div id="main-content" class="container allContent-section py-4">
        <h2 style="color:white">Customer List</h2>
        <input type="text" id="customerSearch" class="form-control" placeholder="Search Customer...">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Id_Customer</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Nomor HP</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Username</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                <?php foreach ($customerdetails as $index => $customerdetails) : ?>
                    <tr>
                        <td class="text-center"><?php echo $customerdetails['customer_id']; ?></td>
                        <td class="text-center"><?php echo $customerdetails['full_name']; ?></td>
                        <td class="text-center"><?php echo $customerdetails['phone_number']; ?></td>
                        <td class="text-center"><?php echo $customerdetails['email']; ?></td>
                        <td class="text-center"><?php echo $customerdetails['password']; ?></td>
                        <td class="text-center"><?php echo $customerdetails['username']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="?action=customerList&page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?action=customerList&page=<?php echo $i; ?>" <?php echo ($i == $page) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages) : ?>
                <a href="?action=customerList&page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
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
        document.getElementById("main").style.marginLeft= "20px";
        document.getElementById("main-content").style.marginLeft= "150px";  
        document.getElementById("main").style.display="block";
        document.getElementById("homeofshoe").style.display="block";  
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#customerSearch').keyup(function() {
                var searchQuery = $(this).val();
                if (searchQuery.length >= 0) {
                    $.ajax({
                        type: 'POST',
                        url: '?action=searchCustomer', 
                        data: { query: searchQuery },
                        success: function(response) {
                            $('#customerTableBody').html(response);
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '?action=searchCustomer', 
                        data: { query: '' },
                        success: function(response) {
                            $('#customerTableBody').html(response);
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>

<?php
// Include the database connection and AdminModel.php
include_once __DIR__ ."/adminHeader.php";
include_once __DIR__ ."/sidebar.php";
include_once __DIR__ . "/../../models/admin/adminmodel.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 10;

// Get all Paket Cuci data using the static method
$merk = AdminModel::getPaginatedMerk($page,$perPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="app\assets\css\paket.css"></link>
</head>
<body>
    <div id="main-content" class="container allContent-section py-4">
        <h2 style="color:white">Merk List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Id_Merk</th>
                    <th class="text-center">Nama Merk</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merk as $index => $merk) : ?>
                    <tr>
                        <td class="text-center"><?php echo $merk['merk_id'] ?></td>
                        <td class="text-center"><?php echo $merk['nama_merk']; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <a class="button-edit"style="color:white">Tambah Merk</a>
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
        function addmerk() {
            $.ajax({
                type: 'GET',
                url: '?action=tambahmerk',
                success: function(response) {
                    $('#main-content').html(response);
                    $('.popup').fadeIn('slow');
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        $(document).on('click', '.button-edit', function(e) {
            e.preventDefault();
            addmerk();      
        });


    </script>

</body>
</html>

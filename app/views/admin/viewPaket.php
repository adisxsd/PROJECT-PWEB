<?php
// Include the database connection and AdminModel.php
include_once __DIR__."/adminHeader.php";
include_once __DIR__ ."/sidebar.php";
include_once __DIR__ . "/../../models/admin/adminmodel.php";

// Get all Paket Cuci data using the static method
$paketCuciData = AdminModel::getPaketCuci();
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
        <h2 style="color:white">Package List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Id_Paket</th>
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paketCuciData as $index => $paketCuci) : ?>
                    <tr>
                        <td class="text-center"><?php echo $index + 1; ?></td>
                        <td class="text-center"><?php echo $paketCuci['nama_paket']; ?></td>
                        <td class="text-center"><?php echo $paketCuci['deskripsi']; ?></td>
                        <td class="text-center"><?php echo $paketCuci['harga']; ?></td>
                        <td class="text-center" colspan="2">
                            <a href="?action=editpaket&paket_cuci_id=<?=$paketCuci['paket_cuci_id']; ?>" class="buttonedit" data-paketid="<?=$paketCuci['paket_cuci_id']; ?>">Edit</a>
                            <a href="?action=deletePaketCuci&paket_cuci_id=<?=$paketCuci['paket_cuci_id']; ?>" class="buttondelete"
                            onclick="return confirm('Apakah anda yakin ingin menghapus paket ini?')">
                            Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <a class="button-edit"style="color:white">Tambah Paket</a>
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
        function tambahPaket() {
            $.ajax({
                type: 'GET',
                url: '?action=tambahpaket',
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
            tambahPaket(); 
        });
    </script>
    
    <script>
        function editpaket(paketId) {
            $.ajax({
                type: 'GET',
                url: '?action=editpaket&paket_cuci_id=' + paketId,
                success: function(response) {
                    $('#main-content').html(response);
                    $('.popup').fadeIn('slow');
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }
        $(document).on('click', '.buttonedit', function(e) {
            e.preventDefault();
            var paketId = $(this).data('paketid');
            editpaket(paketId); 
        });
        // function editpaket() {
        //     $.ajax({
        //         type: 'GET',
        //         url: '?action=editpaket&paket_cuci_id=<?=$paketCuci['paket_cuci_id']; ?>',
        //         success: function(response) {
        //             $('#main-content').html(response);
        //             $('.popup').fadeIn('slow');
        //         },
        //         error: function(error) {
        //             console.log(error.responseText);
        //         }
        //     });
        // }

        // $(document).on('click', '.buttonedit', function(e) {
        //     e.preventDefault();
        //     editpaket(); 
        // });
    </script>




    </script>

</body>
</html>
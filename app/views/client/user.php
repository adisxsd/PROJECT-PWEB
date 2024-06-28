<?php include('app\assets\client\Components\navbar.inc.php'); ?>
<?php require('app\assets\client\Components\head.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Order HOS</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="app/assets/css/formorder.css" />
    
    

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    function updateTotalHarga() {
      const selectedPackage = $('#paket_cuci_id').find('option:selected');
      const packagePrice = selectedPackage.data('harga');
      $('#total_harga').text(packagePrice);
    }

    $(document).ready(function() {
      $('#merk').select2();
      $('#paket_cuci_id').change(updateTotalHarga);

      // Initialize total price
      updateTotalHarga();
    });
  </script>
</head>
<body>
  
    
    <!-- <h2>HOME OF SHOE</h2> -->
    <h3>Masukkan Data Order Anda : </h3>
    <?php
    include_once __DIR__ . "/../../models/client/customermodel.php";
    ?>
    

    <form action="?action=inputSepatu" method="POST">
        <label for="size">Ukuran Sepatu:</label>
        <input type="size" name="size" required><br>

        <label for="merk">Merk Sepatu:</label>
        <select class="form_select" id="merk" name="merk_id" required>
            <option value="" selected disabled>Pilih Brand Sepatu Anda</option>
            <?php
            $jenis_merk = jenis_merk::select();
            for ($i=0; $i <count($jenis_merk['merk_id']); $i++) {
            ?>
              <option value="<?= $jenis_merk['merk_id'][$i]; ?>"><?= $jenis_merk['nama_merk'][$i]; ?></option>
            <?php
            }
            ?>
        </select>
        <script>
        $(document).ready(function() {
            $('#merk').select2();
         });
        </script>
        <label for="paket_cuci">Paket Cuci:</label>
        <select id="paket_cuci_id" name="paket_cuci_id" onchange="updateTotalHarga()" required>
            <option value="" selected disabled>Pilih Paket Cuci</option>
            <?php
            $jenis_paket = jenis_paket::paket();
            for ($i = 0; $i < count($jenis_paket['paket_cuci_id']); $i++) {
                ?>
                <option value="<?= $jenis_paket['paket_cuci_id'][$i]; ?>" data-harga="<?= $jenis_paket['harga'][$i]; ?>">
                    <?= $jenis_paket['nama_paket'][$i]; ?>
                </option>
                <?php
            }
            ?>
        </select><br>
        <label for="alamat_delivery">Alamat Delivery:</label>
        <textarea name="alamat_delivery" rows="4" required></textarea><br>
        <label for="total_harga">Total Harga:</label>
        <span id="total_harga">0.00</span><br>
        <p class="pesan-catatan">Lakukan pembayaran saat kami pickup.</p>

        <button type="submit" name="simpan">Buat Pesanan</button>
    </form>
    
    <!-- <div class="wave">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,229.3C384,256,480,256,576,250.7C672,245,768,235,864,240C960,245,1056,267,1152,245.3C1248,224,1344,160,1392,128L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div> -->
    

  </body>
</html>
<?php require('app\assets\client\Components\footer.inc.php'); ?>

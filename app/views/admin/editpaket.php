<?php
include_once __DIR__ . "/../../models/admin/adminmodel.php";
$package = AdminModel::getPaketCucibyId($paket_cuci_id);
?>

<div class="container mt-5">
        <h2 style="color:white">Edit Package</h2>
        <form action="?action=updatePaketCuci" method="post">
            <input type="hidden" name="paket_cuci_id" value="<?php echo $package['paket_cuci_id']; ?>">
            <div class="form-group">
                <label for="packageName" style="color:white">Package Name:</label>
                <input type="text" class="form-control" id="packageName" name="nama_paket" value="<?php echo $package['nama_paket']; ?>" required>
            </div>
            <div class="form-group">
                <label for="packageDescription" style="color:white">Description:</label>
                <textarea class="form-control" id="packageDescription" name="deskripsi" rows="3" required><?php echo $package['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="packagePrice" style="color:white">harga:</label>
                <input type="number" class="form-control" id="packagePrice" name="harga" value="<?php echo $package['harga']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Package</button>
        </form>
    </div>
<?php
include_once "app\models\client\customermodel.php";

$order = CustomerModel::getOrder();

?>

<link rel="stylesheet" href="app\assets\css\hmpguserstyle.css">
<section class="gallery"> 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 0">
        <path
            fill="#0F53EC"
            fill-opacity="0"
            d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"
        ></path>
    </svg>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Order History</h1>
                <p>Check your order history here</p>
            </div>
        </div>
        <div class="row mt-5 justify-content-end">
            <div class="col-md-2">
            <a href="?action=pageOrder">
              <button id="orderButton" type="button" class="btnorder btn-outline-success btn-lg">
                Add Order
              </button>
            </a>
            </div>
        </div>
        <br><br>
        
                    <tbody>
                        <?php foreach ($order as $index) : ?>
                            <!-- <tr>
                                <td class="text-center"><?php echo $index['transaksi_id'] ?></td>
                                <td class="text-center"><?php echo $index['customer_name']; ?></td>
                                <td class="text-center"><?php echo $index['tanggal_transaksi']; ?></td>
                                <td class="text-center"><?php echo $index['alamat_delivery']; ?></td>
                                <td class="text-center"><?php echo $index['paket_cuci_name']; ?></td>
                                <td class="text-center"><?php echo $index['size']; ?></td>
                                <td class="text-center"><?php echo $index['merk_name']; ?></td>
                                <td class="text-center"><?php echo $index['status_name']; ?></td>
                            </tr> -->
                            <div class="simple-card">
                                <div class="card-header">
                                    <p class="text-muted mb-2">Order ID <span class="fw-bold text-body"><?php echo $index['transaksi_id'] ?></span></p>
                                    <p class="text-muted mb-0">Place On <span class="fw-bold text-body"><?php echo $index['tanggal_transaksi']; ?></span></p>
                                    <p class="text-muted mb-0">Delivery to : <span class="fw-bold text-body"><?php echo $index['alamat_delivery']; ?></span></p>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-row mb-4 pb-2">
                                        <div class="flex-fill">
                                            <h5 class="bold"><?php echo $index['merk_name']; ?></h5>
                                            <p class="text-muted"><?php echo $index['size']; ?></p>
                                            <h4 class="mb-3"><?php echo $index['paket_cuci_name']; ?></h4>
                                            <p class="text-muted">Status : <span class="text-body"><?php echo $index['status_name']; ?></span></p>
                                        </div>
                                        <div>
                                            <img class="align-self-center img-fluid"
                                                src="app\assets\image\sneakers.png" width="170">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?> <!-- Add this endforeach -->
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 500">
        <path
            fill="#0F53EC"
            fill-opacity="0"
            d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"
        ></path>
    </svg>
</section>
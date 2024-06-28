<?php 
include_once "app\models\admin\adminmodel.php";
$paket=Adminmodel::getPaketCuci() ;
?>
   
   <link href="app\assets\css\hmpguserstyle.css">

<section class="services gradient">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 125">
        <path
            fill="#fff"
            fill-opacity="0"
            d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
    </svg>

    <?php foreach ($paket as $index) : ?>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $index['nama_paket'] ?></h1>
                            <p class="card-text"><?php echo $index['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="app\assets\image\boot.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 125">
        <path
            fill="#fff"
            fill-opacity="0"
            d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
    </svg>
</section>
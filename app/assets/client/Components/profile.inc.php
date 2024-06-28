<link rel="stylesheet" href="app\assets\css\profile.css">
<?php
include_once __DIR__ . "/../../../models/client/customermodel.php";
$customer = CustomerModel::getCustomerbyId();
$message= isset($message) ? $message :"";
?>

<body>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"><path fill="#0099ff" fill-opacity="0" d="M0,128L48,138.7C96,149,192,171,288,197.3C384,224,480,256,576,261.3C672,267,768,245,864,234.7C960,224,1056,224,1152,234.7C1248,245,1344,267,1392,277.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

    <div class="container emp-profile">
    <form action="?action=updateCustomer" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="app\assets\image\profile.png" alt="Profile Picture" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="full_name" value="<?php echo $customer['full_name'] ?>">
            </div>
            <div class="col-md-6">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $customer['username'] ?>" >
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $customer['email'] ?>">
            </div>
            <div class="col-md-6">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $customer['phone_number'] ?>">
            </div>
            <div class="col-md-6">
                <label>New Password</label>
                <input type="password" class="form-control" name="password" placeholder="Leave blank if not changing">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
              <input type="submit" class="profile-edit-btn" onclick="return confirm('Apakah anda yakin ingin mengubah data anda?')" name="update" value="Edit Profile"/>
                
            </div>
        </div>
        <div class="row mt-3">
        <p><?php
                if (!empty($message)) {
                    echo '<script>alert("' . $message . '");</script>';
                }
        ?></p>
</div>
    </form>
    </div>


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"><path fill="#0099ff" fill-opacity="0" d="M0,96L48,80C96,64,192,32,288,21.3C384,11,480,21,576,48C672,75,768,117,864,144C960,171,1056,181,1152,192C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

</body>
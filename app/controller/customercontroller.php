<?php
include_once '../PROJECT PWEB/app/models/client/customermodel.php';

class CustomerController {
    private $model;
    public function __construct($conn) {
        $this->model = new CustomerModel($conn);
    }
    public static function index()
    {
        include('../PROJECT PWEB/app/views/client/landing-page+login.php');
    }
    public function saveregister() {
        $full_name = $_POST['Full_name'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
       

        CustomerModel::register_akun($full_name, $email, $password, $username);
        header('Location : ?action=index');
        exit();
    }

    public function proccesslogin() {
        $message = ""; // Initialize the variable
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $password = $_POST['Password'];

            
            if (empty($email) || empty($password)) {
                $message = "Login gagal. Mohon isi semua kolom.";
            } else {
                $user = $this->model->savelogin($email, $password);
    
                if ($user) {
                    $_SESSION['user_id'] = $user['customer_id'];
                    header('Location: ?action=pageHome');
                } else {
                    $message = "Login gagal. Username atau password salah.";
                }
            }
        }
        include('../PROJECT PWEB/app/views/client/landing-page+login.php');
    }
    public function logout() {
        session_destroy();

        // Redirect to login page or any other desired page after logout
        header('Location: ?action=index');
        exit();
    }

    public function updateCustomer()
    {
        $message = "";
        $customer_id = $_SESSION['user_id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];

        $result = $this->model->updateCustomer($customer_id,$full_name,$username,$email,$phone_number,$password);

        if ($result) {
            $message="Data Berhasil Di Update";
        } else {
            $message="Gagal mengupdate data.";
        }
        
        include("../PROJECT PWEB/app/views/client/profile.php");
        
    }
    
    public function pageInput() {
        include("../PROJECT PWEB/app/views/client/homepage.php");
    }
    public function pageHome() {
        include("../PROJECT PWEB/app/views/client/homepage.php");
    }
    public function pageServices() {
        include("../PROJECT PWEB/app/views/client/services.php");
    }
    public function pageRiwayat() {
        include("../PROJECT PWEB/app/views/client/riwayat.php");
    }
    public function pageProfile() {
        include("../PROJECT PWEB/app/views/client/profile.php");
    }
    public function pageOrder() {
        include("../PROJECT PWEB/app/views/client/user.php");
    }

    public function inputSepatu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_SESSION['user_id'];
            $size = $_POST['size'];
            $merk_id = $_POST['merk_id'];
            $paket_cuci_id = $_POST['paket_cuci_id'];
            $alamat_delivery = $_POST['alamat_delivery'];

          
            $result = $this->model->saveLaundryOrder($customer_id,$merk_id, $size, $paket_cuci_id, $alamat_delivery);

            if ($result) {
                header('Location: ?action=pageRiwayat');
            } else {
                echo "Gagal menyimpan pesanan laundry.";
            }
        }
    }
    
}
?>



<?php 
include("../PROJECT PWEB/app/models/admin/adminmodel.php");


class Admincontroller{
    private $model;

    public function __construct($conn) {
        $this->model = new Adminmodel($conn);
    }
    public function loginadmin() {
        include("../PROJECT PWEB/app/views/admin/loginadmin.php");
    }
    public function homepageadmin() {
        include("../PROJECT PWEB/app/views/admin/homepageadmin.php");
    }
    public function proccessloginadm() {
        $message = ""; // Initialize the variable
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['Username']) ? $_POST['Username'] : '';
            $password = isset($_POST['Password']) ? $_POST['Password'] : '';
    
            // Check if fields are empty
            if (empty($username) || empty($password)) {
                $message = "Login gagal. Mohon isi semua kolom.";
            } else {
                $admin = $this->model->login($username, $password);
    
                if ($admin) {
                    $_SESSION['user_id'] = $admin['admin_id'];
                    header('Location: ?action=homepageadmin');
                } else {
                    $message = "Login gagal. Username atau password salah.";
                }
            }
        }
        
        // Pass the message to the HTML template
        include("../PROJECT PWEB/app/views/admin/loginadmin.php");
    }
    
    public function viewpaket()
    {
        include 'app/views/admin/viewPaket.php';
    }
    public function vieworders()
    {
        include 'app/views/admin/viewOrder.php';
    }
    public function viewOnGoingorders()
    {
        include 'app/views/admin/viewOngoingOrder.php';
    }
    public function viewcustomer()
    {
        include 'app/views/admin/viewCustomers.php';
    }
    public function searchCustomer()
    {
        include 'app/views/admin/searchCustomer.php';
    }
    public function editpaket($paket_cuci_id)
    {
        // Anggap nilai ada dalam parameter URL
        $paketCuci=Adminmodel::getPaketCucibyId($paket_cuci_id);
        include 'app/views/admin/editpaket.php';
    }
    public function tambahpaket()
    {
        include("../PROJECT PWEB/app/views/admin/tambahpaket.php");
    }
    public function tambahmerk()
    {
        include("../PROJECT PWEB/app/views/admin/tambahmerk.php");;
    }

    public function PageMerk() {
        include("../PROJECT PWEB/app/views/admin/viewMerk.php");
    }

    
    
    public function updatePaketCuci($paketCuciId)
    {
        $paketCuciId=$_POST['paket_cuci_id'];
        $namaPaket = $_POST['nama_paket'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        $result = $this->model->updatePaketCuci($paketCuciId, $namaPaket, $deskripsi, $harga);

        if ($result) {
            header('Location: ?action=viewpaket');
        } else {
            echo "Gagal mengupdate paket cuci.";
        }
    }
    public function deletePaketCuci() {
        $paketCuciId = $_GET['paket_cuci_id'];
        
        $result = $this->model->deletePaketCuci($paketCuciId);

        if ($result) {
            header('Location: ?action=viewpaket');
        } else {
            echo "Gagal menghapus paket cuci.";
        }
    }
    public function customerList()
    {
    $perPage = 10; // Jumlah item per halaman
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini

    // Mendapatkan data customer untuk halaman saat ini
    $customerdetails = AdminModel::getPaginatedCustomers($page, $perPage);

    // Mendapatkan total customer untuk menghitung total halaman
    $totalCustomers = totaldata::getTotalCustomers(); // Implementasikan ini di dalam model Anda
    $totalPages = ceil($totalCustomers / $perPage);

    // Meneruskan data ke view
    include("../PROJECT PWEB/app/views/admin/viewCustomers.php");
    }   
    public function OrderList()
    {
    $perPage = 10; // Jumlah item per halaman
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini

    // Mendapatkan data customer untuk halaman saat ini
    $merkdetail = AdminModel::getPaginatedOrder($page, $perPage);

    // Mendapatkan total customer untuk menghitung total halaman
    $totalOrders = totaldata::getTotalOrders(); // Implementasikan ini di dalam model Anda
    $totalPages = ceil($totalOrders / $perPage);

    // Meneruskan data ke view
    include("../PROJECT PWEB/app/views/admin/viewOrder.php");
    }
    public function MerkList()
    {
    $perPage = 10; // Jumlah item per halaman
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini

    // Mendapatkan data customer untuk halaman saat ini
    $merkdetail = AdminModel::getPaginatedMerk($page, $perPage);

    // Mendapatkan total customer untuk menghitung total halaman
    $totalOrders = totaldata::getTotalMerk(); // Implementasikan ini di dalam model Anda
    $totalPages = ceil($totalOrders / $perPage);

    // Meneruskan data ke view
    include("../PROJECT PWEB/app/views/admin/viewMerk.php");
    }
    
    public function addpaket(){
        $nama_paket = $_POST['nama_paket'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        $result = $this->model->addpaket($nama_paket, $deskripsi, $harga);
        if ($result) {
            header('Location: ?action=viewpaket');
        } else {
            echo "Gagal mengupdate paket cuci.";
        }
    }
    public function addmerk(){
        $nama_paket = $_POST['nama_merk'];
       

        $result = $this->model->addmerk($nama_paket);
        if ($result) {
            header('Location: ?action=PageMerk');
        } else {
            echo "Gagal menambah paket cuci.";
        }
    }
    public function updateOrderStatus()
{
    // Handle the logic for updating order status
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['transaksi_id'], $_POST['status_id'])) {
            $transaksiId = $_POST['transaksi_id'];
            $newStatusId = $_POST['status_id'];

            $result = $this->model->updateOrderStatus($transaksiId, $newStatusId);
            if ($result) {
                header('Location: ?action=viewOnGoingorders');
            } else {
                echo "Gagal mengupdate paket cuci.";
            }
        } else {
            echo "Invalid POST data.";
            var_dump($_POST);
        }
    }
}
    
}


?>
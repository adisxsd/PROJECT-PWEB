<?php
// File: app/model/CustomerModel.php
include_once __DIR__ . "/../../config/conn.php";
class CustomerModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public static function register_akun($full_name,$username,$email,$password) {
        global $conn;

        try {
    
            $sql = "INSERT INTO customer (full_name,email,password,username) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            // $stmt->bind_param('sssss', $full_name,, $email, $password,);
        
            // // Eksekusi statement SQL
            // $result = $stmt->execute();
            // return $result; // Mengembalikan nilai berdasarkan hasil eksekusi query
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }

            $stmt->bind_param('ssss', $full_name,$username,$email,$password);
            if (!$stmt->execute()) {
                throw new Exception("Execute statement failed: " . $stmt->error);
            } 
        } catch (Exception $e) {
                http_response_code(500);
                echo "Error: " . $e->getMessage();
                return;
        }
    }
    public function savelogin($email,$password){
        
        $query = "SELECT * FROM customer WHERE email=? AND password=?";
        $stmt = $this->conn->prepare($query);

        // Binding parameter
        $stmt->bind_param('ss', $email, $password);

        // Eksekusi statement
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Cek hasil query
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            return $user; 
        } else {
            return false; 
        }

    }

    
    public function saveLaundryOrder($customer_id,$merk_id, $size, $paket_cuci_id, $alamat_delivery) {
        try {

            $sql = "INSERT INTO transaksi (customer_id,merk_id, size, paket_cuci_id, alamat_delivery,status_id, tanggal_transaksi)
                    VALUES (?,?, ?, ?, ?, ?, NOW())";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $this->conn->error);
            }

            $status_id_default = 1; // Status default, bisa disesuaikan
            $stmt->bind_param('iiiisi',$customer_id, $merk_id, $size, $paket_cuci_id, $alamat_delivery, $status_id_default);

            if (!$stmt->execute()) {
                throw new Exception("Execute statement failed: " . $stmt->error);
            }

            return true;
        } catch (Exception $e) {
            http_response_code(500);
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public static function getOrder()
    {
        {
            global $conn;
            $sql = "SELECT 
            transaksi.*,
            customer.full_name AS customer_name,
            paket_cuci.nama_paket AS paket_cuci_name,
            merk.nama_merk AS merk_name,
            status_pesanan.nama_status AS status_name
            FROM transaksi
            LEFT JOIN customer ON transaksi.customer_id = customer.customer_id
            LEFT JOIN paket_cuci ON transaksi.paket_cuci_id = paket_cuci.paket_cuci_id
            LEFT JOIN merk ON transaksi.merk_id = merk.merk_id
            LEFT JOIN status_pesanan ON transaksi.status_id = status_pesanan.status_id
            WHERE transaksi.customer_id = $_SESSION[user_id]
            ORDER BY transaksi.tanggal_transaksi DESC;";
            $result = $conn->query($sql);
    
            $order = array();
            while ($row = $result->fetch_assoc())
            {
                $order[] = $row;
            }
    
            return $order;
        }
    }
    public static function getCustomerbyId()
    {
        global $conn;
        $customer_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM customer WHERE customer_id = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        $stmt->close();

        return $customer;
    }
    public function updateCustomer($customer_id, $full_name, $username, $email, $phone_number, $password)
    {
        $sql = "UPDATE customer SET full_name = ?, username = ?, email = ?, password = ?, phone_number = ? WHERE customer_id = ?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssssii", $full_name, $username, $email, $password, $phone_number, $customer_id);
            $success = $stmt->execute();
            $stmt->close();
            return $success;
        } else {
            return false;
        }
    }
    



}
class jenis_merk {
    static function select(){
        global $conn;
        $sql="SELECT * FROM merk";
        $result= $conn->query($sql);
        $arr = array();

        if ( $result->num_rows > 0)  {
            while ($row = mysqli_fetch_assoc($result) ) {
                foreach ($row as $key => $value){
                    $arr[$key][]= $value;
                }
            }
        }
        return $arr;
    }
}
class jenis_paket {
    static function paket(){
        global $conn;
        $sql= "SELECT * FROM paket_cuci";
        $result= $conn->query($sql);
        $arr = array();

        if ( $result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result) ) {
                foreach ($row as $key => $value){
                    $arr[$key][]= $value;
                }
            }
        }
        return $arr;
    }
}
?>
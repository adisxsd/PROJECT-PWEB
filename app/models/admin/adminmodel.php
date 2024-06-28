<?php 
include_once __DIR__ . "/../../config/conn.php";

class Adminmodel{
    
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function login($username, $password){
        $query = "SELECT * FROM admin WHERE username=? AND password=?";
        $stmt = $this->conn->prepare($query);

        // Binding parameter
        $stmt->bind_param('ss', $username, $password);

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
    public function addpaket($nama_paket, $deskripsi, $harga) {
        try {

            $sql = "INSERT INTO paket_cuci (nama_paket, deskripsi,harga)
                    VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $this->conn->error);
            }

            $stmt->bind_param('ssi',$nama_paket, $deskripsi, $harga);

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
    public function addmerk($nama_merk) {
        try {

            $sql = "INSERT INTO merk (nama_merk)
                    VALUES (?)";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $this->conn->error);
            }

            $stmt->bind_param('s',$nama_merk);

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
    public static function getPaketCuci()
    {
        global $conn;
        $sql = "SELECT * FROM paket_cuci";
        $result = $conn->query($sql);

        $paketCuciDetails = array();
        while ($row = $result->fetch_assoc()) {
            $paketCuciDetails[] = $row;
        }

        return $paketCuciDetails;
    }
    public static function getPaketCucibyId($paket_cuci_id)
    {
        global $conn;
        $sql = "SELECT * FROM paket_cuci WHERE paket_cuci_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $paket_cuci_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $package = $result->fetch_assoc();
        $stmt->close();

        return $package;
    }
    public static function getStatusPesanan(){
    global $conn;
    $sql = "SELECT * FROM status_pesanan";
    $result = $conn->query($sql);

    $statusPesananData = array();
    while ($row = $result->fetch_assoc()) {
        $statusPesananData[] = $row;
    }

    return $statusPesananData;
    }
    public static function updateOrderStatus($transaksiId, $newStatusId){
    global $conn;

    // You may need to validate the input parameters before using them in the query

    $sql = "UPDATE transaksi SET status_id = ? WHERE transaksi_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $newStatusId, $transaksiId);
        $success = $stmt->execute();
        $stmt->close();
    

    return $success;
    } else {
        // Handle the SQL error
        return false;
    }
   }



    // Fungsi untuk mendapatkan detail paket cuci berdasarkan ID
    public static function getPaginatedCustomers($page, $perPage){
    global $conn;

    
    $start = ($page - 1) * $perPage;

    
    $sql = "SELECT * FROM customer LIMIT $start, $perPage";
    $result = $conn->query($sql);

    $customerdetails = array();
    while ($row = $result->fetch_assoc()) {
        $customerdetails[] = $row;
    }

    return $customerdetails;
    }
    // public static function getCustomer()
    // {
    //     global $conn;
    //     $sql = "SELECT * FROM customer";
    //     $result = $conn->query($sql);

    //     $customerdetails = array();
    //     while ($row = $result->fetch_assoc()) {
    //         $customerdetails[] = $row;
    //     }

    //     return $customerdetails;
    // }
    public static function searchCustomer($query){
        global $conn;

        $sql = "SELECT * FROM customer WHERE 
                full_name LIKE ? OR
                phone_number LIKE ? OR
                email LIKE ? OR
                username LIKE ?";
        
        $stmt = $conn->prepare($sql);
        $searchQuery = '%' . $query . '%';
        $stmt->bind_param("ssss", $searchQuery, $searchQuery, $searchQuery, $searchQuery);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $customers = array();
        
        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
        
        $stmt->close();

        return $customers;
    }
    public static function getOrder()
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
        WHERE transaksi.status_id=5
        ORDER BY transaksi.tanggal_transaksi DESC";
        $result = $conn->query($sql);

        $order = array();
        while ($row = $result->fetch_assoc()) {
            $order[] = $row;
        }

        return $order;
    }
    public static function getPaginatedOrder($page, $perPage){
        global $conn;
    
        
        $start = ($page - 1) * $perPage;
    
        
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
        WHERE transaksi.status_id=5
        ORDER BY transaksi.tanggal_transaksi DESC
        LIMIT $start, $perPage";
        $result = $conn->query($sql);
    
        $orderdetails = array();
        while ($row = $result->fetch_assoc()) {
            $orderdetails[] = $row;
        }
    
        return $orderdetails;
    }
    public static function getPaginatedMerk($page, $perPage){
        global $conn;
    
        
        $start = ($page - 1) * $perPage;
    
        
        $sql = "SELECT * from merk
        LIMIT $start, $perPage";
        $result = $conn->query($sql);
    
        $merkdetail = array();
        while ($row = $result->fetch_assoc()) {
            $merkdetail[] = $row;
        }
    
        return $merkdetail;
        }
    public static function getOnGoingOrder()
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
        WHERE transaksi.status_id != 5
        ORDER BY transaksi.tanggal_transaksi DESC";
        $result = $conn->query($sql);

        $order = array();
        while ($row = $result->fetch_assoc()) {
            $order[] = $row;
        }

        return $order;
    }

    // Fungsi untuk mengupdate paket cuci
    public function updatePaketCuci($paketCuciId, $namaPaket, $deskripsi, $harga)
    {
       
        $sql = "UPDATE paket_cuci SET nama_paket = ?, deskripsi = ?, harga = ? WHERE paket_cuci_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssii", $namaPaket, $deskripsi, $harga, $paketCuciId);
            $success = $stmt->execute();
            $stmt->close();
            return $success;
        } else {
            return false;
        }
    }
    public function deletePaketCuci($paketCuciId){
        $sql = "DELETE FROM paket_cuci WHERE paket_cuci_id = ?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $paketCuciId);
            $success = $stmt->execute();
            $stmt->close();
            return $success;
        } else {
            return false;
        }
    }

}
class totaldata {
    public static function getTotalCustomers() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM customer";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public static function getTotalOrders() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM transaksi";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public static function getTotalMerk() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM merk";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    public static function getTotalPackage() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM paket_cuci";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
}



?>
<?php
include_once __DIR__ . "/../../models/admin/adminmodel.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 10;

$query = $_POST['query'];

if ($query !== '') {
    $customerDetails = AdminModel::searchCustomer($query);
} else {
    $customerDetails = AdminModel::getPaginatedCustomers($page, $perPage);
}

foreach ($customerDetails as $index => $customer) {
    echo '<tr>
            <td class="text-center">' . $customer['customer_id'] . '</td>
            <td class="text-center">' . $customer['full_name'] . '</td>
            <td class="text-center">' . $customer['phone_number'] . '</td>
            <td class="text-center">' . $customer['email'] . '</td>
            <td class="text-center">' . $customer['password'] . '</td>
            <td class="text-center">' . $customer['username'] . '</td>
          </tr>';
}
?>

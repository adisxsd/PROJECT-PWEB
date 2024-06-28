<?php
	require_once("../PROJECT PWEB/app/config/conn.php");
	require_once("../PROJECT PWEB/app/controller/customercontroller.php");
	require_once("../PROJECT PWEB/app/controller/admincontroller.php");

	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$paket_cuci_id = isset($_GET['paket_cuci_id']) ? $_GET['paket_cuci_id'] : null;
	$customer_id= isset($_GET['customer_id']) ? $_GET['customer_id'] : null;


    $customerController = new CustomerController($conn);  // Fix: Change CustomerController to DataController
	$adminController = new AdminController($conn);
	

    switch ($action) {
		case 'saveregister':
			$customerController->saveregister();
			// header('Location: ../PROJECT PWEB/app/views/client/login.php');
			break;
		case 'proccesslogin':
			$customerController->proccesslogin();
			break;
		case 'logout':
			$customerController->logout();
			break;
		case 'proccessloginadm':
			$adminController->proccessloginadm();
			break;
		case 'loginadmin':
			$adminController->loginadmin();
			break;
		case 'pageInput':
			$customerController->pageInput();
			break;
		case 'updateCustomer':
			$customerController->updateCustomer();
			break;
		case 'inputSepatu':
			$customerController->inputSepatu();
			break;
		case 'pageHome':
			$customerController->pageHome();
			break;
		case 'pageOrder':
			$customerController->pageOrder();
			break;
		case 'pageServices':
			$customerController->pageServices();
			break;
		case 'pageRiwayat':
			$customerController->pageRiwayat();
			break;
		case 'pageProfile':
			$customerController->pageProfile();
			break;
		case 'PageMerk':
			$adminController->PageMerk();
			break;
		case 'homepageadmin':
			$adminController->homepageadmin();
			break;
		case 'viewpaket':
			$adminController->viewpaket();
			break;
		case 'viewcustomer':
			$adminController->viewcustomer();
			break;
		case 'customerList':
			$adminController->customerList();
			break;
		case 'orderList':
			$adminController->OrderList();
			break;
		case 'searchCustomer':
			$adminController->searchCustomer();
			break;
		case 'vieworders':
			$adminController->vieworders();
			break;
		case 'viewOnGoingorders':
			$adminController->viewOnGoingorders();
			break;
		case 'updateOrderStatus':
			$adminController->updateOrderStatus();
			break;
		case 'editpaket':
			$adminController->editpaket($paket_cuci_id);
			break;
		case 'updatePaketCuci':
			$adminController->updatePaketCuci($paket_cuci_id);
			break;
		case 'deletePaketCuci':
			$adminController->deletePaketCuci();
			break;
		case 'addpaket':
			$adminController->addpaket();
			break;
		case 'addmerk':
			$adminController->addmerk();
			break;
		case 'tambahmerk':
			$adminController->tambahmerk();
			break;
		case 'tambahpaket':
			$adminController->tambahpaket();
			break;
        default:
            $customerController::index();

    }
  
?>

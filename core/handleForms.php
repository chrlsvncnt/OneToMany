<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertClientBtn'])) {

	$query = insertClient($pdo, $_POST['CustomerName'], $_POST['ContactNumber'], $_POST['Email'], $_POST['Address'], $_POST['City']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editClientBtn'])) {
	$query = updateClient($pdo, $_POST['ContactNumber'], $_POST['Email'], $_POST['Address'], $_POST['City'], $_GET['CustomerID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteClientBtn'])) {
	$query = deleteCustomer($pdo, $_GET['CustomerID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewShipmentBtn'])) {
	$query = insertShipment($pdo, $_POST['ProductName'], $_POST['Size'], $_POST['Color'], $_POST['Price'], $_POST['StockQuantity'], $_GET['CustomerID']);

	if ($query) {
		header("Location: ../ClothingShop.php?CustomerID=" .$_GET['CustomerID']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editShipmentBtn'])) {
	$query = updateShipment($pdo, $_POST['ProductName'], $_POST['Size'], $_POST['Color'], $_POST['Price'], $_POST['StockQuantity'], $_GET['ProductID']);

	if ($query) {
		header("Location: ../ClothingShop.php?CustomerID=" .$_GET['CustomerID']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteShipmentBtn'])) {
	$query = deleteOrder($pdo, $_GET['ProductID']);

	if ($query) {
		header("Location: ../ClothingShop.php?CustomerID=" .$_GET['ProductID']);
	}
	else {
		echo "Deletion failed";
	}
}




?>
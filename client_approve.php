<?php
require_once 'classes/booked_clients.php';
if (isset($_GET['id'])) {
    $clientId = $_GET['id'];

    $client = new BookedClients($clientId);
    $client->approveClient($clientId);

    header("Location: trainer_dashboard.php");
    exit;
}else{
    echo "Client ID is not provided.";
}
?>

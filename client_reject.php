<?php
require_once 'classes/booked_clients.php';

if (isset($_GET['id'])) {
    $trainerId = $_GET['id'];

    $client = new BookedClients();
    $client->rejectClient($trainerId);

    header("Location: trainer_dashboard.php");
    exit;
} else {
    echo "Client ID not provided.";
}
?>
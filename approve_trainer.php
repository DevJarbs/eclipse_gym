<?php
require_once 'controllers/trainer.php';

if (isset($_GET['id'])) {
    $trainerId = $_GET['id'];

    $trainer = new Trainer();
    $trainer->approveTrainer($trainerId);

    header("Location: pending_trainer.php");
    exit;
}else{
    echo "Trainer ID not provided.";
}
?>

<?php
session_start();
if (!isset($_SESSION['trainer_id'])) {
    die("Unauthorized access. Please log in as a trainer.");
}

$trainerId = $_SESSION['trainer_id'];

require_once 'classes/db_controller.php';

try {
    $db = new dbController();
    $connection = $db->getConn();


    $stmt = $connection->prepare("CALL sp_client_status(:trainerId)");
    $stmt->bindParam(':trainerId', $trainerId, PDO::PARAM_INT);
    $stmt->execute();

    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Bokor&family=Cairo:wght@200..1000&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    /* General styles */
    body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        overflow: hidden;
    }
    .main-content {
        flex: 1;
        background: #212121;
        color: #fff;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .main-content h2 {
        position: relative;
        top: 15%;
        left: 17%;
    }

    .logo img {
        max-width: 100px;
        position: absolute;
        top: 10px;
        right: 20px;
    }
    table {
            width: 80%;
            background: #333;
            color: #fff;
            border-collapse: collapse;
            text-align: left;
            position: relative;
            top: 17%;
            left: 17%;
        }

        table th, table td {
            padding: 15px;
            border: 1px solid #555;
        }

        table th {
            background: #444;
            text-transform: uppercase;
        }
        .menu-toggle {
        display: none;
    }


    /* Media Query for Mobile Screens */
    @media (max-width: 1024px) {
        .main-content {
            margin-left: 0;
            padding-top: 50px;
        }
        .main-content h2{
            font-size: 2.5rem;
            position: relative;
            left: 0%;
       
            
        }
        table {
            width: 100%;
            background: #333;
            color: #fff;
            border-collapse: collapse;
            text-align: left;
            position: relative;
            top: 17%;
            left: 2px;
        }

        table th, table td {
            padding: 15px;
            border: 1px solid #555;
        }

        table th {
            background: #444;
            font-size: 10px;
            text-transform: uppercase;
        }
    }
</style>
</head>
<body>
    <?php include './sidebar.php'; ?>
    <div class="main-content">
        <h2>Bookings:</h2>
        <table>
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Training Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($client['client_name']); ?></td>
                            <td><?php echo htmlspecialchars($client['training_option']); ?></td>
                            <td><?php echo htmlspecialchars($client['start_date']) . ' - ' . htmlspecialchars($client['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($client['start_time']) . ' - ' . htmlspecialchars($client['end_time']); ?></td>
                            <td><?php echo htmlspecialchars($client['contact_num']); ?></td>
                            <td><?php echo htmlspecialchars($client['email']); ?></td>
                            <td><?php echo htmlspecialchars($client['total_cost']); ?></td>
                </tr>
                <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

    <script>
        function updateStatus(bookingId, status) {
            if (confirm(`Are you sure you want to ${status} this booking?`)) {
                fetch('./update_booking_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ booking_id: bookingId, status: status })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Booking ${status} successfully!`);
                        location.reload();
                    } else {
                        alert(`Failed to ${status} booking. Please try again.`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again later.');
                });
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

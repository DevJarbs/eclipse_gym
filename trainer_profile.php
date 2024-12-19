<?php
session_start();

if (!isset($_SESSION['trainer_id'])) {
    header("Location: login.php");
    exit();
}

$trainer_id = $_SESSION['trainer_id'];

require_once 'classes/db_controller.php';

try {
    $db = new dbController();
    $conn = $db->getConn();

    $query = "SELECT trainer_username, trainer_email, mobile_num FROM trainer_login WHERE trainer_id = :trainer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $trainer_username = $row['trainer_username'];
        $trainer_email = $row['trainer_email'];
        $mobile_num = $row['mobile_num'];
    } else {
        die("Trainer not found.");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updated_username = $_POST['trainer_username'];
        $updated_email = $_POST['trainer_email'];
        $updated_mobile = $_POST['mobile_num'];

        if (!is_numeric($updated_mobile)) {
            echo "<div class='alert alert-danger'>Please enter a valid mobile number.</div>";
        } else {
            $update_query = "UPDATE trainer_login SET trainer_username = :username, trainer_email = :email, mobile_num = :mobile WHERE trainer_id = :trainer_id";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bindParam(':username', $updated_username);
            $update_stmt->bindParam(':email', $updated_email);
            $update_stmt->bindParam(':mobile', $updated_mobile, PDO::PARAM_INT);
            $update_stmt->bindParam(':trainer_id', $trainer_id, PDO::PARAM_INT);

            if ($update_stmt->execute()) {
                echo "<div class='alert alert-success'>Profile updated successfully.</div>";
                header("Location: trainer_profile.php");
                exit();

            } else {
                echo "<div class='alert alert-danger'>Error updating profile.</div>";
                print_r($update_stmt->errorInfo());
            }
        }
    }

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<?php include './sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color:rgb(61, 65, 68);
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }
        .wrapper {
            display: flex;
            flex: 1;
        }
        #sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            flex-shrink: 0;
        }
        .main-content-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .main-content {
            width: 100%;
            max-width: 600px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
            text-align: center;
        }
        .form-label {
            font-weight: 500;
            color: #34495e;
        }
        .form-control {
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 12px 20px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .alert {
            border-radius: 5px;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }
            #sidebar {
                width: 100%;
            }
            .main-content-wrapper {
                padding: 10px;
            }
            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-content-wrapper">
            <div class="main-content">
                <h2>Update Your Profile</h2>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="trainer_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="trainer_username" name="trainer_username" value="<?php echo htmlspecialchars($trainer_username ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="trainer_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="trainer_email" name="trainer_email" value="<?php echo htmlspecialchars($trainer_email ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_num" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="<?php echo htmlspecialchars($mobile_num ?? ''); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
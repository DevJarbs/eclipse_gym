<?php
require_once 'controllers/trainer.php';

$trainer = new Trainer();
$pendingTrainers = $trainer->fetchPendingTrainers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/pending_trainer.css">
    <title>Pending Trainer Approvals</title>
</head>
<body>
    <h1>Pending Trainer Approvals</h1>
    <table>
        <tr>
            <th>Trainer Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        <?php if (count($pendingTrainers) > 0): ?>
            <?php foreach ($pendingTrainers as $trainer): ?>
            <tr>
                <td><?php echo htmlspecialchars($trainer['trainer_username']); ?></td>
                <td><?php echo htmlspecialchars($trainer['trainer_email']); ?></td>
                <td><?php echo htmlspecialchars($trainer['mobile_num']); ?></td>
                <td>
                    <a href="approve_trainer.php?id=<?php echo urlencode($trainer['trainer_id']); ?>" class="action-links approve">Approve</a> |
                    <a href="reject_trainer.php?id=<?php echo urlencode($trainer['trainer_id']); ?>" class="action-links reject">Reject</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No pending trainers found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

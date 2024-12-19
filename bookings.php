<?php require_once 'booking_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Update Bookings</title>
    <link rel="stylesheet" href="style/bookings.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
</head>
<body class="bod">
    <div class="container">
        <h1 class="text-center">Your Bookings</h1>
       
        <?php if ($bookings): ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Booking ID</th>
                        <th>Trainer</th>
                        <th>Training Option</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Rate per Session</th>
                        <th>Total Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $bookingDetails): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bookingDetails['booking_id']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['trainer']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['training_option']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['start_time']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['end_time']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['rate_per_session']); ?></td>
                            <td><?php echo htmlspecialchars($bookingDetails['total_cost']); ?></td>
                            <td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editBooking(<?php echo htmlspecialchars($bookingDetails['booking_id']); ?>)">Edit</button></td>                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="booking_logic.php" method="POST">    
                    <input type="hidden" name="booking_id" id="booking_id">
                    <div class="mb-3">
                            <label for="trainer" class="form-label">Select Trainer</label>
                            <select name="trainer" id="trainer">
                                <option value="Kurt">Kurt</option>
                                <option value="Frenand">Frenand</option>
                                <option value="Rex">Rex</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="training_option" class="form-label">Training Type</label>
                            <select name="training_option" id="training_option">
                                <option value="Hitt">Hitt</option>
                                <option value="Strength">Strength</option>
                                <option value="endurance">endurance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" id="start_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="time" name="end_time" class="form-control" id="end_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="rate_per_session" class="form-label">Rate per Session</label>
                            <input type="number" name="rate_per_session" class="form-control" id="rate_per_session" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_cost" class="form-label">Total Cost</label>
                            <input type="number" name="total_cost" class="form-control" id="total_cost" readonly>
                        </div>
                        <button type="button" id="calculateCost" class="btn btn-primary done-btn mb-3">Calculate Total Cost</button>
                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/rateperses.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

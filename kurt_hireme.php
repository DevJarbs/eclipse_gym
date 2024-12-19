<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .booking-modal {
            background-color: #333;
            border-radius: 15px;
            padding: 2rem;
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 1rem;
        }
        .form-control, .form-select {
            background-color: #444;
            border: 1px solid #fff;
            color: #fff;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }
        .form-control:focus, .form-select:focus {
            background-color: #444;
            border-color: #666;
            color: #fff;
            box-shadow: none;
        }
        .date-time-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .date-time-group {
            flex: 1;
            min-width: 250px;
        }
        .done-btn {
            background-color: #0066ff;
            border: none;
            padding: 0.75rem;
            width: 100%;
            border-radius: 5px;
            color: #fff;
            font-weight: 500;
            margin-top: 1rem;
        }
        .done-btn:hover {
            background-color: #0052cc;
        }
    </style>
</head>
<body>
    <div class="header">
    <h1 class="text-center mb-3">YOU'RE ABOUT TO HIRE KURT</h1>
        <p class="text-center mb-4">Provide the date and time that works for you.</p>

    <div class="booking-modal">
    <form id="bookingForm">
        <label for="trainer" class="d-flex justify-content-center">
          <input type="text" id="trainerDisplay" class="form-control text-center fs-5 bg-primary" value="Kurt" disabled>
          <input type="hidden" name="trainer" id="trainer" value="Kurt">
        </label>

            <select class="form-select" name="training_option" required>
                <option selected disabled>Select a Training</option>
                <option value="Hitt">HIIT</option>
                <option value="Strength">STRENGTH</option>
                <option value="endurance">ENDURANCE</option>
            </select>

            <div class="date-time-container">
                <div class="date-time-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                    <label for="start_time">Start Time:</label>
                    <input type="time" class="form-control" id="startTime" name="start_time" required>
                </div>
                <div class="date-time-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="endDate" name="end_date" required>
                    <label for="end_time">End Time:</label>
                    <input type="time" class="form-control" id="endTime" name="end_time" required>
                </div>
            </div>

            <input type="number" class="form-control" id="ratePerSession" name="rate_per_session" value="100" placeholder="Rate per session" readonly>
            <input type="number" class="form-control" id="totalCost" name="total_cost" placeholder="Total Cost" readonly>
            <button type="button" id="calculateCost" class="done-btn mb-3">Calculate Total Cost</button>
            <button type="submit " class="done-btn mb-3">Done</button>
           
        </form>
    </div>
    </div>
    <script src="JS/hirekurt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

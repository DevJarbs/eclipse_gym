function updateRatePerSession() {
    const trainer = document.getElementById('trainer').value;
    let rate = 0;

    if (trainer === 'Kurt') {
        rate = 100;
    } else if (trainer === 'Frenand') {
        rate = 150;
    } else if (trainer === 'Rex') {
        rate = 120;
    }

    document.getElementById('rate_per_session').value = rate;
}

window.onload = function () {
    updateRatePerSession();
    document.getElementById('trainer').addEventListener('change', updateRatePerSession);
};

document.getElementById('calculateCost').addEventListener('click', function () {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    const ratePerSession = parseFloat(document.getElementById('rate_per_session').value);

    if (!startDate || !endDate || isNaN(ratePerSession)) {
        alert("Please fill out all fields and provide a valid rate per day.");
        return;
    }

    const startDateTime = new Date(startDate);
    const endDateTime = new Date(endDate);

    if (endDateTime <= startDateTime) {
        alert("End date must be after the start date.");
        return;
    }

    const diffInTime = endDateTime - startDateTime;
    const numberOfDays = diffInTime / (1000 * 3600 * 24) + 1;

    const totalCost = numberOfDays * ratePerSession;
    document.getElementById('total_cost').value = totalCost;
});

function editBooking(bookingId) {
    document.getElementById('booking_id').value = bookingId;
}

document.getElementById('editForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);
    fetch('booking_logic.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json();
        })
        .then(data => {
            if (data.status) {
                $('#editModal').modal('hide');
                location.reload();
            } else {
                alert('Error updating booking: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        });
});

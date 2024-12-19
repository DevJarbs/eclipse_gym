document.addEventListener('DOMContentLoaded', () => {
    const bookingForm = document.getElementById('bookingForm');

    bookingForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(bookingForm);

        try{
            const response = await fetch('bookatraining.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();

            if (result.status){
                Swal.fire({
                    title: 'Success',
                    text: 'Your booking has been successfully submitted!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then(() => {
                    bookingForm.reset();
                    window.location.href = 'rex_hireme.php';
                });
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: result.message || 'Failed to submit the booking. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Try Again',
                });
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error',
                text: 'An unexpected error occurred. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        }
    });
});
document.getElementById('calculateCost').addEventListener('click', function () {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const ratePerSession = parseFloat(document.getElementById('ratePerSession').value);

    if (!startDate || !endDate || isNaN(ratePerSession)){
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
    document.getElementById('totalCost').value = totalCost;
});
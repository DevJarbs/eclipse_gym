document.addEventListener('DOMContentLoaded', ()=>{
    const trainerLogInForm = document.getElementById('trainerLogInForm');
    
    trainerLogInForm.addEventListener('submit', async(e)=>{
        e.preventDefault();

        const formData = new FormData(trainerLogInForm);
        
        try{
            const response = await fetch('trainer_login.php',{
                method: 'POST',
                body: formData,
            });
            const result = await response.json();
            if(result.status){
               Swal.fire({
                title: 'Success',
                text: 'Log in successful',
                icon: 'success',
                confirmButtonText: 'OK'
               }).then(()=>{
                window.location.href = 'trainer_dashboard.php';
               })
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: result.message,
                    icon: 'error',
                    confirmButtonText: 'Try again'
                });
            }
        }catch(error){
           console.error('Error', error);
            Swal.fire({
                title: 'Error',
                text: 'An unexpected error occured. Please try again',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});
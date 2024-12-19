document.addEventListener('DOMContentLoaded', ()=>{
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', async(e)=>{
         e.preventDefault();

         const formData = new FormData(loginForm);

         try{
            const response = await fetch('login.php',{
                method: 'POST',
                body: formData,
            });
            const result = await response.json();
         if(result.status){
            Swal.fire({
                title: 'Success',
                text: 'Log in successful',
                icon: 'success',
                confirmButtonText: 'OK',
            }).then(()=>{
                window.location.href = 'useraccess.php';
            })
        }else{
            Swal.fire({
                title: 'Error!',
                text: result.message,
                icon: 'error',
                confirmButtonText: 'Try Again',
              });
            }
         }catch(error){
            console.error('Error', error);
            Swal.fire({
                title:'Error',
                text: 'An unexpected error occured. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
         }
    });
});


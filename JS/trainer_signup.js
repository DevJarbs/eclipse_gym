document.addEventListener('DOMContentLoaded', ()=>{
    const form = document.forms["form"];

    if(form){
        form.addEventListener('submit', async(e)=>{
            e.preventDefault();
            const formData = new FormData(form);
            
            try{
                const response = await fetch("trainer_signup.php",{
                  method: 'POST',
                  body: formData,
                });

                const result = await response.json();

                if(result.status){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                        confirmButtonText: 'OK'
                    }).then(()=>{
                        window.location.href = 'trainer_login.html';
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        tittle: 'Error',
                        text: result.message,
                        confirmButtonText: 'Retry'
                    });
                }
            }catch(error){
                console.error("Error sending request:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong',
                    confirmButtonText: 'Retry'
                });
            }
        });
    }
});
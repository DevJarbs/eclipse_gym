document.addEventListener('DOMContentLoaded', ()=>{
    const cpassform = document.forms["cpassform"];
    
      cpassform.addEventListener("submit", async (e)=>{
        e.preventDefault();
        const formData = new FormData(cpassform);
  
        try{
          const response = await fetch("userchangepass.php",{
            method: "POST",
            body: formData,
          });

          const result = await response.json();
  
          if(result.status){
            Swal.fire({
              icon: "success",
              title: "Password Changed Successfully",
              text: result.message,
              confirmButtonText: "OK"
            }).then(()=>{
              window.location.href = "user_changepass.php";
            });
          }else{
            Swal.fire({
              icon: "error",
              title: "Error",
              text: result.message,
              confirmButtonText: "Retry"
            });
          }
        }catch(error){
          console.error("Error sending request:", error);
          Swal.fire({
            icon: "error",
            title: "Server Error",
            text: "Something went wrong.",
            confirmButtonText: "Retry"
          });
        }
      });
  });
  
document.querySelector(".btn-login").addEventListener("click", function() {
    Swal.fire({
      title: "ingin mengganti password ?",
      showCancelButton: true,
      confirmButtonText: "Confirm",
      windowlocationhref:  "change-password.php",
      confirmButtonColor: "#00ff99",
      cancelButtonColor: "#ff0099"
    });
  });
  
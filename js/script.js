function previewFile() {
    const preview = document.querySelector('.imgselection');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function showPass() {
    var password = document.getElementById("password");
    if (password.type === "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  }

  function confirmDialog(){
    var x = confirm("Register MyTutor?");
    if (x == true){
        return true;
    } else {
        return false;
    }
}

  function rememberMe() {
    var email = document.forms["loginForm"]["email"].value;
    var pass = document.forms["loginForm"]["pass"].value;
    var rememberme = document.forms["loginForm"]["remember"].checked;
    if (!rememberme) {
        setUsers("email", "", 0);
        setUsers("password", "", 0);
        setUsers("remember", false, 0);
        document.forms["loginForm"]["email"].value = "";
        document.forms["loginForm"]["pass"].value = "";
        document.forms["loginForm"]["remember"].checked = false;
        alert("Credentials removed");
    } else {
        if (email == "" || pass == "") {
            document.forms["loginForm"]["remember"].checked = false;
            alert("Please enter your credentials");
            return false;
        } else {
            setUsers("email", email, 50);
            setUsers("passward", pass, 50);
            setUsers("remember", rememberme, 50);
            alert("Credentials Stored Success");
        }
    }
}

document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let firstname = document.getElementById("fname").value;
    let middle_name = document.getElementById("middle_name").value;
    let lastname = document.getElementById("lastname").value;
    let familyname = document.getElementById("familyname").value;
    let phonenumber = document.getElementById("phonenumber").value;
    let confirmpassword = document.getElementById("confirmpassword").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let dob = document.getElementById("dob").value;
    let user_type = document.getElementById("user_type").value;
    if (password !== confirmpassword) {
        alert('Passwords do not match.');
       
    }
    
    fetch("signup.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            firstname: firstname,
            middle_name: middle_name,
            lastname: lastname,
            familyname: familyname,
            phonenumber: phonenumber,
            confirmpassword: confirmpassword,
            email: email,
            password: password,
            dob: dob,
            user_type:user_type
            
        }),
        
    })
    .then(response => response.json())
    .then(data => {
        // alert(data.message);
        // Clear form fields
        document.getElementById("fname").value = "";
        document.getElementById("middle_name").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("familyname").value = "";
        document.getElementById("phonenumber").value = "";
        document.getElementById("confirmpassword").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("dob").value = "";
        document.getElementById("user_type").value = "";
        window.location.href='./login.html';
        // return false;
    })
    .catch(error => {
        console.error("Error:", error);
    });
});

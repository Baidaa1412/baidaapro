document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("login").addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        const data = {
            email: email,
            password: password
        };

        fetch('login.php', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.admin) {
                    window.location.href = 'user_dashboard.php';
                    
                } else {   window.location.href = 'admin_dashboard.php'; 
                   
                }
            } else {
                document.getElementById("errorMessage").textContent = "Invalid email or password.";
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});

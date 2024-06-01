document.addEventListener("DOMContentLoaded", function() {
    const registrationForm = document.querySelector("form[action='register.php']");
    registrationForm.addEventListener("submit", function(event) {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const age = document.getElementById("age").value;
        const weight = document.getElementById("weight").value;
        const height = document.getElementById("height").value;
        const goals = document.getElementById("goals").value;
        
        if (!username || !password || !age || !weight || !height || !goals) {
            alert("Please fill out all required fields.");
            event.preventDefault();
        }
    });
});

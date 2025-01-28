<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <form class="form-signin" id="loginForm">       
            <h2 class="form-signin-heading">Please login</h2>
            <label>First name</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter your name" id="first_name">
            <label>Last name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter your Last name" id="last_name">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" id="email">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" id="password">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" id="phone">
            <label>City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter your city name" id="city">
            <label>Date of Birth</label>
            <input type="date" class="form-control" name="user_date" id="user_date">
            <span id="dob-error" style="color: red;"></span>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>   
        </form>
    </div>

    <script>
       $(document).ready(function() {
    // Validate date of birth on change
    $("#user_date").on("change", function() {
        let dob = $(this).val().trim();
        if (dob === "") {
            $("#dob-error").text("Date of birth is required.");
        } else {
            let dobDate = new Date(dob);
            let today = new Date();
            let age = today.getFullYear() - dobDate.getFullYear();
            let monthDiff = today.getMonth() - dobDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
                age--;
            }

            if (age < 18) {
                $("#dob-error").text("You are not eligible as you are under 18 years old.");
            } else {
                $("#dob-error").text(""); // Clear error if eligible
            }
        }
    });

    $("#loginForm").on("submit", function(e) {
        e.preventDefault(); // Prevent form submission

        // Clear previous error messages
        $(".error").remove();

        let isValid = true;

        // Validate first name
        if ($("#first_name").val().trim() === "") {
            $("#first_name").after('<span class="error" style="color:red;">First name is required.</span>');
            isValid = false;
        }

        // Validate last name
        if ($("#last_name").val().trim() === "") {
            $("#last_name").after('<span class="error" style="color:red;">Last name is required.</span>');
            isValid = false;
        }

        // Validate email
        let email = $("#email").val().trim();
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailRegex.test(email)) {
            $("#email").after('<span class="error" style="color:red;">Enter a valid email.</span>');
            isValid = false;
        }

        // Validate password
        if ($("#password").val().trim().length < 6) {
            $("#password").after('<span class="error" style="color:red;">Password must be at least 6 characters long.</span>');
            isValid = false;
        }

        // Validate phone number
        let phone = $("#phone").val().trim();
        let phoneRegex = /^\d{10}$/;
        if (phone === "" || !phoneRegex.test(phone)) {
            $("#phone").after('<span class="error" style="color:red;">Enter a valid 10-digit phone number.</span>');
            isValid = false;
        }

        // Validate city
        if ($("#city").val().trim() === "") {
            $("#city").after('<span class="error" style="color:red;">City is required.</span>');
            isValid = false;
        }

        // Validate date of birth
        let dob = $("#user_date").val().trim();
        if (dob === "") {
            $("#user_date").after('<span class="error" style="color:red;">Date of birth is required.</span>');
            isValid = false;
        } else {
            let dobDate = new Date(dob);
            let today = new Date();
            let age = today.getFullYear() - dobDate.getFullYear();
            let monthDiff = today.getMonth() - dobDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
                age;
            }

            if (age < 18) {
                $("#dob-error").text("You are not eligible as you are under 18 years old.");
                isValid = false;
            } else {
                $("#dob-error").text("");
            }
        }

        // If all fields are valid, submit the form
        if (isValid) {
            alert("Form submitted successfully!");
            this.submit();
        }
    });
});

    </script>
</body>
</html>
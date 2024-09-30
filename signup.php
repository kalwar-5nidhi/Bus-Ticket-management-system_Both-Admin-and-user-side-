<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Where To - Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Where To?</h2>
        <form action="signupdb.php" method="POST">
            <div class="fullname">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full_name" placeholder="Enter full name">
            </div>
            <div class="num">
                <label for="mobile-number">Mobile Number</label>
                <input type="text" id="mobile-number" name="mobile_number" placeholder="Enter mobile number">
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="Signinas">
                <label for="Signin-as">SignUp as:</label>
                <select id="Signin-as" name="sign_in_as">
                    <option value=" ">Role</option>
                    <option value="user">Customer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="Signup">
                <button type="submit" name="signup_submit">Sign Up</button>
            </div>
            <div class="Signin">
                <p>Already have an account? <a href="login.php">login!</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="formStyle.css" />
    <title>Notes</title>
</head>

<body>
    <div class="App">
        <div class="container">
            <form onsubmit="" class="form-container" method="POST" action="registerUser.php">
                <h2>Registration</h2>

                <!-- fullname -->
                <div class="fullname-input-box">
                    <div class="input-box">
                        <span>First Name</span>
                        <input name="fname" required type="text" placeholder="enter your first name" />
                    </div>
                    <div class="input-box">
                        <span>Last Name</span>
                        <input name="lname" required type="text" placeholder="enter your last name" />
                    </div>
                </div>

                <!-- email -->
                <div class="input-box">
                    <span>Email</span>
                    <input name="email" required type="email" placeholder="enter your email" />
                </div>

                <!-- password -->
                <div class="input-box">
                    <span>Password</span>
                    <input name="password" required type="password" placeholder="enter your password" />
                </div>


                <button type="submit">Submit</button>
                <div class="footer">
                    <button type="button" onClick="window.location.replace('index.php');">Already have an account? click
                        here</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.body.style.backgroundImage = `url(${"light.jpg"})`;

    </script>
</body>

</html>
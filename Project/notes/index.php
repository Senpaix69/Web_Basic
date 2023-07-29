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
            <form onsubmit="" class="form-container" method="POST" action="loginUser.php">
                <h2>Login</h2>

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
                    <button type="button" onClick="window.location.replace('registeration.php');">Do not have an a
                        ccount? register
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
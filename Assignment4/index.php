<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee & Tea Shop</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class='container'>
        <div class='main-title'>
            <h1> Welcome to Coffee & Tea Shop</h1>
            <h4> Project by Huraira Younas </h4>
        </div>
        <button onclick="window.location.replace('main.php');" class='tile'>
            <img src="customer.png" height="70px" alt="customerImage">
            <h3>Login as a customer</h3>
        </button>
        <button onclick="window.location.replace('chefView.php');" class='tile'>
            <img src="chef.png" height="80px" alt="chefImage">
            <h3>Login as a chef</h3>
        </button>
        <button onclick="window.location.replace('cashierView.php');" class='tile'>
            <img src="cashier.png" height="70px" alt="cashierImage">
            <h3>Login as a cashier</h3>
        </button>
    </div>
</body>

</html>
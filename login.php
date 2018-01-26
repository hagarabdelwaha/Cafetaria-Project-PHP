<!DOCTYPE html>
<html>
<head>
<meta name="login" content="width=device-width, initial-scale=1">
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: grey;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}


.container {
    padding: 16px;
}

</style>
</head>
<body>

<h1 align="center">Cafetria</h1>

  <div class="container">
    <form method="post" action="controllers/userController.php">

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <span class="error">* <?php if(isset($_GET['mailErr'])){echo $_GET['mailErr'] ;} else {echo "";}?></span>


    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <span class="error">* <?php if(isset($_GET['pswErr'])){echo $_GET['pswErr'] ;} else {echo "";}?></span>


    <button type="submit">Login</button>
  </form>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>

<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>

    <!-- Login Form -->
    <div class="container-fluid">
        <div class="card loginCard col-4 offset-4">
            <h1 style="padding-top:20px; text-align:center;">Login</h1>
            <?php if (isset($_SESSION['loginErrorMsg'])) {echo '<p style="color:red; padding-top:20px; text-align:center;">'.$_SESSION['loginErrorMsg'].'</p>'; unset($_SESSION['loginErrorMsg']);}; ?>
            <form action="scripts/loginScript.php" method="post" class="d-flex justify-content-center form-signin mt-3">
                <div class="col-md-11">
                    <div class="form-group"><input type="text" name="loginUser" id="loginUser" class="form-control mb-3" placeholder="Username" autofocus></div>
                    <div class="form-group"><input type="password" name="loginPass" id="loginPass" class="form-control mb-3" placeholder="Password"></div>
                    <button type="submit" value="Login" class="btn btn-primary mb-3 col-md-12" style="margin-bottom:25px!important;">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php';?>
</body>
</html>
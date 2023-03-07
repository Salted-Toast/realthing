<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>

    <!-- Redirect if Logged in -->
    <?php if (loginCheck()) {header('Location: index');}; ?>

    <!-- Register Form -->
    <div class="container-fluid">
        <div class="card loginCard col-4 offset-4">
            <h1 style="padding-top:20px; text-align:center;">Register</h1>
            <?php if (isset($_SESSION['registerUnameError'])) {echo '<p style="color:red; padding-top:20px; text-align:center;">'.$_SESSION['registerUnameError'].'</p>'; unset($_SESSION['registerUnameError']);}; ?>
            <?php if (isset($_SESSION['registerBlankError'])) {echo '<p style="color:red; padding-top:20px; text-align:center;">'.$_SESSION['registerBlankError'].'</p>'; unset($_SESSION['registerBlankError']);}; ?>
            <form action="scripts/registerScript.php" method="post" class="d-flex justify-content-center form-signin mt-3">
                <div class="col-md-11">
                    <div class="text-center">
                        <div class="form-group"><input type="text" name="regEmail" class="form-control mb-3" placeholder="Email" autofocus></div>
                        <div class="form-group"><input type="text" name="regFirstname" class="form-control mb-3" placeholder="Firstname"></div>
                        <div class="form-group"><input type="text" name="regSurname" class="form-control mb-3" placeholder="Surname"></div>
                        <div class="form-group"><input type="text" name="regUsername" class="form-control mb-3" placeholder="Username"></div>
                        <div class="form-group"><input type="password" name="regPassword" class="form-control mb-3" placeholder="Password"></div>
                        <button type="submit" value="Login" class="btn btn-primary mb-3 col-md-12" style="margin-bottom:25px!important;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php';?>
</body>
</html>
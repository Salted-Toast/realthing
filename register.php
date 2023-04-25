<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <div class="container-fluid">
        <div class="card col-4 offset-4" id="registerCard">
            <h1 style=" padding-top: 20px; text-align:center;">Register</h1>
            <?php if (isset($_SESSION['registerUsernameError'])){echo '<p style="color:red; padding-top:20px; text-align:center;">' . $_SESSION['registerUsernameError'] . '</p>'; unset($_SESSION['registerUsernameError']);}; ?>
            <?php if (isset($_SESSION['registerBlankError'])){echo '<p style="color:red; padding-top:20px; text-align:center;">' . $_SESSION['registerBlankError'] . '</p>'; unset($_SESSION['registerBlankError']);}; ?>
            <form action="scripts/registerScript.php" method="post" class="d-flex justify-content-center form-signin mt-3">
                <div class="col-md-11 form-group">
                    <input class="form-control mt-3" type="email" name="regEmail" placeholder="Email" required autofocus>
                    <input class="form-control mt-3" type="text" name="regFirstname" placeholder="Firstname" required>
                    <input class="form-control mt-3" type="text" name="regSurname" placeholder="Surname" required>
                    <input class="form-control mt-3" type="text" name="regUsername" placeholder="Username" required>
                    <input class="form-control mt-3" type="password" name="regPassword" placeholder="Password" required>
                    <button class="btn btn-primary mt-3 col-md-12" style="margin-bottom:20px!important;" action="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
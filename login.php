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
        <div class="card col-4 offset-4" id="loginCard">
            <h1 style="padding-top:20px; text-align:center">Login</h1>
            <?php if (isset($_SESSION['loginErrorMsg'])) echo '<p style="text-align:center; color:red; padding-top:20px;">'.$_SESSION['loginErrorMsg'].'</p>'; unset($_SESSION['loginErrorMsg']); ?>
            <form action="scripts/loginScript.php" method="post" class="d-flex justify-content-center form-signin mt-3">
                <div class="col-md-11 form-group">
                    <input class="form-control pl-3 mt-3" type="text" placeholder="Username" name="logUname" autofocus>
                    <input class="form-control mt-3" type="password" placeholder="Password" name="logPword">
                    <button class="btn btn-primary mt-3 mb-3 col-md-12" action="submit">Login</button>
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
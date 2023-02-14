<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>

    <!-- Location Form -->
    <div class="container-fluid">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col mt-5">
                    <form action="scripts/weatherData.php" method="post">
                        <input type="text" name="location" id="location" placeholder="Enter Location!" autofocus>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col mt-5">
                    <?php if (isset($_SESSION['temp'])) {echo $_SESSION['temp']; unset($_SESSION['temp']);};  ?>
                    <?php if (isset($_SESSION['temp_error'])) {echo $_SESSION['temp_error']; unset($_SESSION['temp_error']);};  ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
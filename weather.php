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
                    <form action="scripts/weatherData" method="post">
                        <input type="text" name="location" id="location" placeholder="Enter Location!" autofocus>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
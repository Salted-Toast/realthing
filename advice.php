<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
        <div class="container d-flex justify-content-center">
            <div class="card adviceCard">
                <h1 class="d-flex justify-content-center mt-4">Select Scenario</h1>
                <div class="row mt-3 m-5 d-flex justify-content-center">
                    <div class="col">
                        <form action="coldWeather"><button class="btn btn-primary m-1 adviceButton" type="submit">Cold Weather</button></form>
                        <form action="hotWeather"><button class="btn btn-primary m-1 adviceButton" type="submit">Hot Weather</button></form>
                        <form action="pollution"><button class="btn btn-primary m-1 adviceButton" type="submit">Pollution</button></form>
                    </div>
                    <div class="col">
                        <form action="coldWeather"><button class="btn btn-primary m-1 adviceButton" type="submit">Cold Weather</button></form>
                        <form action="hotWeather"><button class="btn btn-primary m-1 adviceButton" type="submit">Hot Weather</button></form>
                        <form action="pollution"><button class="btn btn-primary m-1 adviceButton" type="submit">Pollution</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
   <!-- Login Check -->
   <?php loginCheck(); ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <?php
                        if (userLocation()===1) {
                            echo '';
                        };
                    ?>
                    <div class="card">
                        <!-- Pollution Graph -->
                        <?php require 'includes/charts/polutionData.php'; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- Forecast Graph -->
                        <?php require 'includes/charts/forecastData.php'; ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'includes/scrollFooter.php'; ?>
    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
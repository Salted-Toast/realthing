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
                    <div class="card" style="margin-top: 12px;">
                        <script src="javascript/userLocation.js"></script>
                        <div id="location"></div>
                    </div>
                    <div class="card" style="margin-top: 12px;">
                        <!-- Pollution Graph -->
                        <?php require 'includes/charts/polutionData.php'; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="margin-top: 12px;">
                        <!-- Forecast Graph -->
                        <?php require 'includes/charts/forecastData.php'; ?>    
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
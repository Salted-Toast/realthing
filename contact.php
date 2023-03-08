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

    <!-- Contact -->
    <div class="container fullHeight d-flex align-items-center justify-content-center">
        <div class="col d-flex justify-content-center text-center">
            <div class="col-md-6 col-sm-12 d-flex align-items-center flex-column pt-5">
                <p>Email: healthadv@healthadv</p>
                <p>Tel: +44 07455 569875</p>
                <p>Address: Knightstone Campus, Knightstone Rd, Weston-super-Mare</p>
                <p>Postcode: BS23 2AL</p>
            </div>
            <div class="col">
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://embedgooglemap.net/124/"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
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
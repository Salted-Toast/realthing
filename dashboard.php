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
        <div class="container ">
            <div class="row mb-3 mt-3 border rounded d-flex align-items-center">
                <div class="col">
                    <?php echo '<h1>Welcome ' . $_SESSION['username'] . '</h1>'; ?>
                </div>
                <div class="col">
                    <form action="account" method="post">
                        <button type="submit" value="details" class="btn btn-warning btn-warning float-end">Manage Account</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="progress" type="button" class="btn btn-primary">Quiz Scores</a>
                    <a href="#" type="button" class="btn btn-primary">Bookings</a>
                    <a href="#" type="button" class="btn btn-primary">Tutor notes</a>
                    <a href="#" type="button" class="btn btn-primary">Apply to become a tutor</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
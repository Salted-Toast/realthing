<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>

    <!-- User Hub -->
    <div class="container-fluid">
        <div class="container">
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
                <div class="btn-group" role="group">
                    <a href="healthTracker" type="button" class="btn btn-primary">Personal Health Tracker</a>
                    <a href="dashboard" type="button" class="btn btn-primary">Air Quality Dashboard</a>
                    <a href="advice" type="button" class="btn btn-primary">Get Advice</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
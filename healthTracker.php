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
        <div class="col">
            <div class="card m-4 p-4">
                <h1 style="text-align:center;">Create Case</h1>
                <br>
                <form action="scripts/caseCreate.php" method="post">
                    <div class="input-group">
                        
                        <h2>User Comment</h2>
                        <textarea class="form-control" name="userComment"></textarea>

                        <h2>Location</h2>
                        <input type="text" class="form-control" name="location" placeholder="Enter your Location"></input>
                        <button class="btn btn-primary" type="submit">Create Case</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card m-4 p-4">
                <h1 style="text-align:center;">View Cases</h1>
            </div>
        </div>
        <div class="col">
            <div class="card m-4 p-4">
                <h1 style="text-align:center;">Custom Health Advice</h1>
            </div>
        </div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
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
    <div class="container">
        <div class="card m-4 p-4">
            <div class="row mb-3 d-flex align-items-center">
                <div class="col">
                    <h1>Account Details</h1>
                </div>
                <div class="col">
                    <a href="scripts/deleteAccount.php" class="btn btn-danger float-end">Delete Account</a>
                </div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="col">
                    <h1>View Details</h1>
                    <?php
                        // Connect to the DB
                        require 'scripts/connect.php';

                        // Craft the SQL Statements
                        $sql1 = "SELECT * FROM users WHERE user_id = ?;";
                        $sql2 = "SELECT * FROM user_profile WHERE user_id = ?;";

                        // Grab user ID
                        $userID = $_SESSION['userID'];

                        // Prep and exec both statements
                        $sqlPrep1 = mysqli_prepare($conn, $sql1);
                        mysqli_stmt_bind_param($sqlPrep1, 's', $userID);
                        mysqli_stmt_execute($sqlPrep1);
                        $usersResult = mysqli_stmt_get_result($sqlPrep1);

                        $sqlPrep2 = mysqli_prepare($conn, $sql2);
                        mysqli_stmt_bind_param($sqlPrep2, 's', $userID);
                        mysqli_stmt_execute($sqlPrep2);
                        $profileResult = mysqli_stmt_get_result($sqlPrep2);

                        // Users Table
                        if ($usersRow = mysqli_fetch_assoc($usersResult)){
                            if (mysqli_num_rows($usersResult) === 1) {
                                $username = $usersRow['username'];
                            };
                        };
                        // User_profile Table
                        if ($profileRow = mysqli_fetch_assoc($profileResult)){
                            if (mysqli_num_rows($profileResult) === 1) {
                                $firstname = $profileRow['firstname'];
                                $surname = $profileRow['surname'];
                                $email = $profileRow['email'];
                            };
                        };
                    ?>
                    <ul>
                        <li>Username: <?php echo $username; ?></li>
                        <li>Firstname: <?php echo $firstname; ?></li>
                        <li>Surname: <?php echo $surname; ?></li>
                        <li>Email: <?php echo $email; ?></li>
                    </ul>
                </div>
                <div class="col">
                    <h1 class="mb-3 text-center">Change Details</h1>
                    <p class="form-text text-center">(Comming Soon)</p>
                    <form class="form-signin" action="#" method="post">
                        <div class="form-group"><input type="text" name="email" class="form-control mb-3" placeholder="Email"></div>
                        <div class="form-group"><input type="text" name="firstname" class="form-control mb-3" placeholder="Firstname"></div>
                        <div class="form-group"><input type="text" name="surname" class="form-control mb-3" placeholder="Surname"></div>
                        <div class="form-group"><input type="text" name="username" class="form-control mb-3" placeholder="Username"></div>
                        <div class="form-group"><input type="password" name="password" class="form-control mb-3" placeholder="Password"></div>
                        <button class="btn btn-primary col-md-12" type="submit">Submit Changes</button>
                    </form>
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
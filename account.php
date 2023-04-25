<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
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

                        // Grab user ID
                        $userID = $_SESSION['userID'];

                        // Craft SQL statements
                        $sql1 = "SELECT * FROM users WHERE user_id = ?";
                        $sql2 = "SELECT * FROM user_profile WHERE user_id = ?";

                        // Prep and exec statements
                        $sqlPrep1 = mysqli_prepare($conn, $sql1);
                        mysqli_stmt_bind_param($sqlPrep1, 'i', $userID);
                        mysqli_stmt_execute($sqlPrep1);
                        $usersResult = mysqli_stmt_get_result($sqlPrep1);

                        $sqlPrep2 = mysqli_prepare($conn, $sql2);
                        mysqli_stmt_bind_param($sqlPrep2, 'i', $userID);
                        mysqli_stmt_execute($sqlPrep2);
                        $profileResult = mysqli_stmt_get_result($sqlPrep2);

                        // Users Table
                        if ($usersRow = mysqli_fetch_assoc($usersResult)) {
                            if (mysqli_num_rows($usersResult) === 1) {
                                $username = $usersRow['username'];
                            };
                        };

                        // User Profile Table
                        if ($profileRow = mysqli_fetch_assoc($profileResult)) {
                            if (mysqli_num_rows($profileResult) === 1) {
                                $firstname = $profileRow['firstname'];
                                $surname = $profileRow['surname'];
                                $email = $profileRow['email'];
                            };
                        };
                    ?>
                    <ul>
                        <li>Username: <?php echo $username;?></li>
                        <li>Firstname: <?php echo $firstname;?></li>
                        <li>Surname: <?php echo $surname;?></li>
                        <li>Email: <?php echo $email;?></li>
                    </ul>
                </div>
                <div class="col">
                    <h1 class="text-center">Change Details</h1>
                    <p class="form-text text-center">(Coming Soon)</p>
                    <form action="#" method="post">
                        <div class="form-signin">
                            <input class="form-control mt-3" type="email" name="email" placeholder="Email">
                            <input class="form-control mt-3" type="text" name="firstname" placeholder="Firstname">
                            <input class="form-control mt-3" type="text" name="surname" placeholder="Surname">
                            <input class="form-control mt-3" type="text" name="username" placeholder="Username">
                            <input class="form-control mt-3" type="password" name="password" placeholder="Password">
                            
                            <button class="btn btn-primary mt-3 col-md-12" action="submit">Change Details</button>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
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
    <div class="row">
        <div class="col">
            <div class="card m-4 p-4" style="overflow:auto;height:80vh;">
                <h1 style="text-align:center;">Create Case</h1>
                <br>
                <form action="scripts/caseCreate.php" method="post">
                    <div class="input-group">
                        <div class="row p-2">
                            <h2>User Comment</h2>
                            <textarea class="form-control" style="height:17vh;" name="userComment" maxlength="500"></textarea>
                            <p type="text" class="form-text">500 Character limit</p>
                        </div>
                        <div class="row p-2">
                            <h2>Location</h2>
                            <input type="text" class="form-control" name="location" placeholder="Enter your Location"></input>
                            <button class="btn btn-primary" type="submit">Create Case</button>
                        </div>
                        <div class="row p-2">
                            <p>Data that will be assigned to your case:</p>
                            <ul>
                                <li>User Comment</li>
                                <li>Location</li>
                                <li>temperature</li>
                                <li>Air Quality Index</li>
                                <li>Date logged</li>
                                <li>Time Logged</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card m-4 p-4" style="overflow:auto;height:80vh;">
                <h1 style="text-align:center;">View Cases</h1>
                <br>
                <?php
                    // Connect to the database
                    require 'scripts/connect.php';

                    // Grab Cases
                    $sql = "SELECT * FROM cases WHERE user_id = ?";

                    // Grab the user ID
                    $userID = $_SESSION['userID'];

                    // Prepare the statement
                    $sqlPrep = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
                    mysqli_stmt_execute($sqlPrep);
                    $result = mysqli_stmt_get_result($sqlPrep);

                    // Check if there are any cases
                    if (mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            echo '
                                <div class="card p-4 m-2">
                                <h2>Case '.$i.'</h2>
                                <div class="row">
                                    <div class="col border">
                                        <p id="location">Location: '.$row['location'].'</p>
                                    </div>
                                    <div class="col border">
                                        <p id="date">Date: '.$row['date'].'</p>
                                    </div>
                                    <div class="col border">
                                        <p id="time">Time: '.$row['time'].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        <p id="comment">Comment: '.$row['user_comment'].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        <p id="temperature">Temperature: '.$row['temperature'].'°C</p>
                                    </div>
                                    <div class="col border">
                                        <p id="air-quality-index">Air Quality Index: '.$row['aqi'].'</p>
                                    </div>
                                </div>
                                </div>';
                        };
                    }else {
                        echo 'No Cases';
                    };
                ?>
            </div>
        </div>
        <div class="col">
            <div class="card m-4 p-4">
                <h1 style="text-align:center;">Custom Health Advice</h1>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
    <?php loginBoot(); ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Health Tracker Tool -->
    <div class="row">
        <div class="col">
            <div class="card m-4 p-4" style="overflow:auto;height:81.5vh;">
                <h1 style="text-align:center;">Create a Case</h1>
                <br>
                <h2 class="">User Comment</h2>
                <form action="scripts/caseCreate.php" method="post">
                    <div class="form-group">
                        <textarea style="width:30vw;height:18vh;" class="form-control" name="userComment" maxlength="500" type="text" require></textarea>
                        <p class="form-text">(500 Character Limit)</p> 
                        <h2>Location</h2>
                        <input class="form-control" type="text" name="location" placeholder="Type your location!" require></input>
                        <button class="btn btn-primary mt-3 col-md-12" action="submit">Create Case</button>
                    </div>
                </form>
                <br>
                <p>Data that will be taken and appended to this case:</p>
                <ul>
                    <li>Air Quality Index</li>
                    <li>Your Comment</li>
                    <li>Your Location</li>
                    <li>The Time this was submitted</li>
                    <li>The temperature</li>
                    <li>The Date of creation</li>
                </ul>
                
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 p-4" style="overflow:auto;height:81.5vh;">
                <h1 style="text-align:center;">View Cases</h1>
                <?php
                    // Connect to DB
                    require 'scripts/connect.php';

                    // Get User ID
                    $userID = $_SESSION['userID'];

                    // Get all cases for specific user
                    $sql = "SELECT * FROM cases WHERE user_id = ?;";

                    // Prepare the SQL for execution
                    $sqlPrep = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
                    mysqli_stmt_execute($sqlPrep);
                    $result = mysqli_stmt_get_result($sqlPrep);

                    // If rows exist fetch array of data
                    if (mysqli_num_rows($result) > 0) {
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            echo '
                                <div class="card m-2 p-4">
                                    <h2>Case '.$i.'</h2>
                                    <div class="row">
                                        <div class="col border">
                                            <p>Location: '.$row['location'].'</p>
                                        </div>
                                        <div class="col border">
                                            <p>Date: '.$row['date'].'</p>
                                        </div>
                                        <div class="col border">
                                            <p>Time: '.$row['time'].'</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p>Comment: '.$row['user_comment'].'</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p>Temperature: '.$row['temperature'].'°C</p>
                                        </div>
                                        <div class="col border">
                                            <p>Air Quality Index: '.$row['aqi'].'</p>
                                        </div>
                                    </div>
                                </div>
                            ';
                        };
                    } else {
                        echo 'No Cases Created';
                    };
                ?>

            </div>
        </div>
        <div class="col">
            <div class="card m-4 p-4" style="overflow:auto;height:81.5vh;">
                <h1 style="text-align:center;">Custom Health Advice</h1>
                <br>
                <?php
                    // Require Pages
                    require 'scripts/connect.php';

                    // Get User ID
                    $userID = $_SESSION['userID'];

                    // Get all cases for specific user
                    $sql = "SELECT * FROM cases WHERE user_id = ?;";

                    // Prepare the SQL for execution
                    $sqlPrep = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
                    mysqli_stmt_execute($sqlPrep);
                    $result = mysqli_stmt_get_result($sqlPrep);

                    // Put AQI and Temps in Arrays
                    if (mysqli_num_rows($result) > 0) {
                        $aqis = array('');
                        $temps = array('');
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Push temps and AQI into arrays
                            array_push($temps, $row['temperature']);
                            array_push($aqis, $row['aqi']);  
                        };
                        // Call functions to see what health advice to give
                        $warmAdvice = warmAdvice($temps);
                        $coldAdvice = coldAdvice($temps);
                        $airAdvice = airAdvice($aqis);
                    };


                    
                  ?>
                <div class="row">
                    <?php if($coldAdvice){echo'<div class="card m-2 p-4">
                        <h2>Cold Weather Advice!</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque assumenda molestias quia repellat minima. Aut, commodi accusantium ducimus ad neque veniam error dicta, dolor quis sed voluptates ea eos! Fugit?</p>
                        <a href="advice#coldWeather" class="btn btn-primary">Get Advice</a>
                    </div>';};?>
                </div>
                <div class="row">
                    <?php if($warmAdvice){echo'<div class="card m-2 p-4">
                        <h2>Warm Weather Advice!</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque assumenda molestias quia repellat minima. Aut, commodi accusantium ducimus ad neque veniam error dicta, dolor quis sed voluptates ea eos! Fugit?</p>
                        <a href="advice#warmWeather" class="btn btn-primary">Get Advice</a>
                    </div>';};?>
                    
                </div>
                <div class="row">
                    <?php if($airAdvice){echo '<div class="card m-2 p-4">
                        <h2>Your Area is Polluted!</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque assumenda molestias quia repellat minima. Aut, commodi accusantium ducimus ad neque veniam error dicta, dolor quis sed voluptates ea eos! Fugit?</p>
                        <a href="advice#pollutedAir" class="btn btn-primary">Get Advice</a>
                    </div>';};?>
                </div>
                <div class="row">
                    <?php if(!$warmAdvice && !$coldAdvice && !$airAdvice){echo '<div class="card m-2 p-4">
                        <h2>You have been near no extreme weather conditions</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque assumenda molestias quia repellat minima. Aut, commodi accusantium ducimus ad neque veniam error dicta, dolor quis sed voluptates ea eos! Fugit?</p>
                        <a href="advice#pollutedAir" class="btn btn-primary">Get Advice</a>
                    </div>';};?>
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
<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
    <?php loginBoot(); ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <div class="container">
        <div class="row mb-3 mt-3 border rounded d-flex align-items-center" style="background-color: #f8f9fa;">
            <div class="col">
                <!-- Say Hello to the user with their username -->
                <?php echo '<h1>Welcome ' . $_SESSION['username'] . '</h1>'; ?>
            </div>
            <div class="col">
                <!-- Button to redirect to account details page -->
                <form action="account">
                    <button type="submit" class="btn btn-warning float-end">Account Details</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="btn-group" role="group">
                <a href="healthTool" type="button" class="btn btn-primary">Health Tracker Tool</a>
                <a href="dashboard" type="button" class="btn btn-primary">Air Quality Dashboard</a>
                <a href="advice" type="button" class="btn btn-primary">Get Some Health Advice</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4 p-4">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#" class="nav-link active" onclick="activateTab(event, 'login-history')">User Login History</a></li>
                <li class="nav-item"><a href="#" class="nav-link" onclick="activateTab(event, 'feature-explanation')">Features Explained</a></li>
            </ul>
            <div id="login-history" class="tab-content">
                <h3 class="mt-3">User Login History</h3>
                <p>Here is a list of recent logins:</p>
                <?php
                    // Connect to the DB
                    require 'scripts/connect.php';

                    // Craft SQL
                    $sql = "SELECT * FROM user_login WHERE user_id = ?;";

                    // Grab User ID
                    $userID = $_SESSION['userID'];

                    // Prepare the SQL for execution
                    $sqlPrep = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
                    mysqli_stmt_execute($sqlPrep);
                    $result = mysqli_stmt_get_result($sqlPrep);

                    if (mysqli_num_rows($result) > 0) {
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            if ($i < 10) {
                                $loginDate = $row['date'];
                                $loginTime = $row['time'];
                                echo '<ul>';
                                echo '  <li>Date: '.$loginDate.' Time: '.$loginTime.'</li>';
                                echo '</ul>';
                            } else {
                                exit();
                            };
                        };
                    };
                ?>
            </div>
            <div id="feature-explanation" class="tab-content">
                <div class="row">
                    <h3 class="mt-3">Personal Health Tracking Tool</h3>
                    <p>The personal health tracking tool acts as a diary, and the user, you will be able to submit enteries or cases with a comment to describe how you are feeling, these then will be submitted to a database allong with lots of other data like the time and date of submission, the location, temperature and the Air quality index. Of which will be analysed to give you personalised health advice based on location and other factors.</p>
                </div>
                <div class="row">
                    <h3>Air Pollution Dashboard</h3>
                    <p>The air pollution dashboard is a dash of info based on an area of the users choosing. Some of the information contained is:</p>
                    <ul style="padding-left: 30px">
                        <li>Max and Min Temp</li>
                        <li>Humidity</li>
                        <li>% of Pollutants</li>
                        <li>And more!</li>
                    </ul>
                </div>
            </div>

            <style>
                .tab-content {
                    display: none;
                }
            </style>

            <script>
                function activateTab(evt, tabName) {
                    // Get all elements with class nav-link and remove active class
                    var tabs = document.getElementsByClassName("nav-link");
                    for (var i = 0; i < tabs.length; i++) {
                        tabs[i].classList.remove("active");
                    };
                    // Add the "active" class to the clicked tab
                    evt.currentTarget.classList.add("active");

                    // Get all the elements with the class "tab-content" and hide them
                    var tabContents = document.getElementsByClassName("tab-content");
                    for (var i = 0; i < tabContents.length; i++) {
                        tabContents[i].style.display = "none";
                    };
                    // Show the clicked tab content
                    document.getElementById(tabName).style.display = "block";
                }
            </script>

        </div>
    </div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body onload="activateTab(event, 'login-history')">
</html>
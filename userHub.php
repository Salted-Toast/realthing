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
                    <a href="account" type="submit" class="btn btn-warning float-end">Manage Account</a>
                </div>
            </div>
            <div class="row">
                <div class="btn-group" role="group">
                    <a href="healthTracker" type="button" class="btn btn-primary">Personal Health Tracker</a>
                    <a href="dashboard" type="button" class="btn btn-primary">Air Quality Dashboard</a>
                    <a href="advice" type="button" class="btn btn-primary">Get Some Advice</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Switch container -->
    <div class="container">
        <div class="card mt-4 p-4">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#" class="nav-link active" onclick="activateTab(event, 'login-history')">User Login History</a></li>
                <li class="nav-item"><a href="#" class="nav-link" onclick="activateTab(event, 'feature-explanation')">Feature Explanation</a></li>
            </ul>
            <div id="login-history" class="tab-content active">
                <h3 class="mt-3">User Login History</h3>
                <p>Here's a list of recent logins:</p>
                <ul>
                    <li>March 25, 2023 - 9:30am</li>
                    <li>March 24, 2023 - 3:15pm</li>
                    <li>March 23, 2023 - 10:45am</li>
                </ul>
            </div>
            <div id="feature-explanation" class="tab-content">
                <h3 class="mt-3">Personal Health Tracker</h3>
                <p>Here's an explanation of our latest feature:</p>
                <h3>Air Quality Dashboard</h3>
            </div>
        </div>
    </div>

    <style>
        .tab-content {
            display: none;
        }
    </style>

    <script>
        function activateTab(evt, tabName) {
            // Get all elements with class="nav-link" and remove the "active" class
            var tabs = document.getElementsByClassName("nav-link");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("active");
            }
            // Add the "active" class to the clicked tab
            evt.currentTarget.classList.add("active");

            // Get all elements with class="tab-content" and hide them
            var tabContents = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }
            // Show the clicked tab content
            document.getElementById(tabName).style.display = "block";
        }
    </script>


    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body onload="activateTab(event, 'login-history')">
</html>
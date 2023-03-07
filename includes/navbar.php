<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">Navbar</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
            </ul>
        </div>
    </div>
    <!-- Dynamic User Reg Buttons -->
    <?php       
        if (!isset($_SESSION['loggedin'])) {
            echo '<div class="navbar-nav">
                    <form action="login"><button class="btn btn-primary" style="margin-right:4px" type="submit">Login</button></form>
                    <form action="register"><button class="btn btn-primary" style="margin-right:7px" type="submit">Register</button></form>
                </div>';
        } elseif (loginCheck()===1) {
            echo '<div class="navbar-nav">
                    <form action="userHub"><button class="btn btn-primary" style="margin-right:4px" type="submit">Your Hub</button></form>
                    <form action="scripts/logoutScript.php"><button class="btn-danger btn" style="margin-right:7px" type="submit">Logout</button></form>
                </div>';
        };
    ?>
</nav>
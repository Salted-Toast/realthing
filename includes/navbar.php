<!-- <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" -->
<nav class="navbar border bg-light navbar-expand-lg bg-body-tertiary" data-bs-theme="light">
    <!-- Text Logo -->
    <a class="navbar-brand" style="margin-left: 23px;" href="index">Health Advice</a>
    <!-- Mobile Responsive Nav -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="donate">Donate</a></li>
            <li class="nav-item"><a class="nav-link" href="advice">Advice</a></li>
            <li class="nav-item"><a class="nav-link" href="about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="sessionCheck">Session Checker</a></li> -->
        </ul>
    </div>
    <!-- Dynamic Buttons -->
    <?php 
        if(loginCheck()) {
            echo '<div class="navbar-nav">
                    <a href="userHub"><button class="btn btn-primary" style="margin-right:4px;" type="submit">User Hub</button></a>
                    <a href="scripts/logout.php"><button class="btn btn-danger" style="margin-right:4px;" type="submit">Logout</button></a>
                </div>';
        } else {
            echo '<div class="navbar-nav">
                    <a href="login"><button class="btn btn-primary" style="margin-right:4px; type="submit">Login</button></a>
                    <a href="register"><button class="btn btn-primary" style="margin-right:4px;" type="submit">Register</button></a>
                </div>';
        };
    ?>
</nav>
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

    <!-- Header -->
    <div class="container-fluid d-flex align-items-center mb-5" id="landingHeader">
        <div class="container rounded p-5" id="headerContent">
            <div class="row">
                <h1>Welcome to Health Advice!</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum cumque illo dolorum similique itaque laborum voluptatem natus modi ex in.</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="donate" class="btn btn-primary float-start me-1"> Donate </a>
                    <a href="advice" class="btn btn-primary flaot-start"> Get Advice </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Who We Are -->
    <div class="container-fluid d-flex mb-3">
        <div class="container">
            <div class="row d-flex align-items-center" id="whoAreWe">
                <div class="col">
                    <h1>Who are we?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum cumque illo dolorum similique itaque laborum voluptatem natus modi ex in.</p>
                    <a href="about" class="btn btn-primary">About us</a>
                </div>
                <div class="col">
                    <img src="images/aboutUsImage.jpg" class="rounded img-fluid" alt="Teacher teaching class">
                </div>
            </div>
        </div>
    </div>

    <!-- Get in Contact -->
    <div class="container-fluid d-flex mb-5">
        <div class="container">
            <div class="row d-flex align-items-center" id="getInContact">
                <div class="col">
                    <img src="images/contactUs.jpg" class="rounded img-fluid" alt="Pile of books">
                </div>
                <div class="col">
                    <h1>Get in contact</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum cumque illo dolorum similique itaque laborum voluptatem natus modi ex in.</p>
                    <a href="contact" class="btn btn-primary float-start me-1"> Contact us </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require 'includes/scrollFooter.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
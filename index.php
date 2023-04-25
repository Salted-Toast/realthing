<html lang="en">
<head>
    <!-- Header -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <div class="container-fluid d-flex align-items-center mb-5" id="landingHeader">
        <div class="container rounded p-5" id="headerContent">
            <div class="row">
                <h1>Welcome to Health Advice</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quos, et a at labore minima in modi adipisci veniam repellat ad, cumque dolorem sunt explicabo commodi dolore accusantium deserunt unde!</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="donate" class="btn btn-primary">Donate</a>
                    <a href="advice" class="btn btn-primary">Advice</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <h1>Who we are</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae nostrum aspernatur fugiat, quia alias ullam libero odio vitae adipisci dolorem, corrupti corporis veritatis culpa laboriosam vel enim, quisquam porro!</p>
                    <a href="about" class="btn btn-primary">About Us</a>
                </div>
                <div class="col">
                    <img src="images/whoWeAre.png" class="rounded" alt="Health professionals viewing charts">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <img src="images/contact.png" class="rounded" alt="Health professionals discussing work">
                </div>
                <div class="col">
                    <h1>Get in contact</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla fugit mollitia beatae aliquid hic, qui quod eligendi, odio culpa eum perspiciatis saepe voluptate itaque eaque totam ipsam atque laudantium accusamus.</p>
                    <a href="contact" class="btn btn-primary">Contact</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php require 'includes/scrollFooter.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
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

    <!-- About -->
    <div class="container-fluid d-flex align-items-center mb-5" id="landingHeader">
        <div class="container rounded p-5" id="headerContent">
            <div class="row">
                <h1>About us</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum cumque illo dolorum similique itaque laborum voluptatem natus modi ex in.</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="donate" class="btn btn-primary float-start me-1"> Get in contact </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="col">
                <div class="row m-4 p-4">
                    <hr>
                    <h1>What do we do?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima rem maxime eveniet repellendus accusamus libero, illo asperiores unde vel adipisci magni voluptates a iusto placeat nam amet. Labore, reiciendis enim!</p>
                    <hr>
                </div>
                <div class="row m-4 p-4">
                    <hr>
                    <h1>How did we start?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, provident! Commodi eos nam, distinctio eius voluptatem placeat laborum quaerat veritatis cupiditate? Blanditiis impedit, aperiam dolor voluptatibus laudantium optio velit molestias.</p>
                    <hr>
                </div>
                <div class="row m-4 p-4">
                    <hr>
                    <h1>How do we provide health advice?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia accusamus animi perspiciatis quam. Hic, ea temporibus cum eum quo quibusdam assumenda, ullam labore nihil, recusandae omnis autem! Dolores, rem quam!</p>
                    <hr>
                </div>
                <div class="row m-4 p-4">
                    <hr>
                    <h1>Why use our services?</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam nobis labore minima quaerat. Facere repellendus voluptate omnis minus fuga qui ea? Dolores architecto perferendis accusantium maiores! Totam omnis quibusdam molestias.</p>
                    <hr>
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
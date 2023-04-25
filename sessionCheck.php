<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <h1>Session Checker</h1>

    <?php var_dump($_SESSION);?>
    <form action="scripts/logout.php"><button class="btn btn-danger">Kill Sessions</button></form>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
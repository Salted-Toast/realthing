<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
   <!-- Login Check -->
   <?php loginCheck(); ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <?php
                                    // Chuck Data into table
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr> <td>' . $row['user_id'] . '</td>';
                                        echo '<td>' . $row['username'] . '</td></tr>';
                                    };
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require 'scripts/userDetails.php'; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                        </thead>
                        <tbody>
                            <?php
                                require 'scripts/userDetails.php';

                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <!-- Form to Change Data -->
                                        <form action="scripts/editData.php" method="post">
                                            ProductID: <input type="number" name="productID" id="productID" value=<?php echo $row['ProductID']; ?>>    
                                            ProductName: <input type="text" name="productName" id="productName" value=<?php echo $row['ProductName']; ?>>
                                            <button type="submit" class="btn btn-primary">Edit Item</button>    
                                        </form>

                                    <?php
                                };
                            ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>
    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>
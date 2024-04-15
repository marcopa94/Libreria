<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Head Content -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar Content -->
</nav>

<div class="container">
    <div id="titolo">
        <!-- Title Content -->
    </div><hr>
    <br>
    <br>
    
    <!--------------------------------------------- Modal pro aggiung ------------------------------------------------------->

    
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-4">
            <div class="card">
             
            </div>
        </div>

        <!------------------------------------- Modale pro modificare ------------------------------------------------------>
     
        
        <?php endwhile; ?>
    </div>
</div>


</body>
</html>

<?php mysqli_close($conn); ?>

<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
  /* .bdy{
    border: 5px solid black;
    
  } */
   *{
    font-weight: 600;
    color: black;
   }
</style>
<body>
  <div class="bdy">
<nav class="navbar navbar-expand-lg p-1 " style="background-color:green;">
  <div class="container-fluid rounded"  style="background-color: beige; height:80px;">
  <img src="http://images.assetsdelivery.com/compings_v2/uasumy/uasumy1708/uasumy170800023.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">

    <a class="navbar-brand" href="index.php">Healthy Eating</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav nav-tabs me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Home</a>
        </li>
        <?php if (isset($_SESSION["username"])): ?>
        <li class="nav-item">
          <a class="nav-link" href="users.php">Users</a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href="recipe.php">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Diet Plans</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact US</a>
        </li>
        


        <?php endif; ?>
      </ul>
      <div class="d-flex">
      <?php if (isset($_SESSION["username"])): ?>
                       
                          
          
        <button class="btn btn-outline-dark">Hello, <?php echo $_SESSION['username']; ?></button>
        
                          <a href="logout.php"><button class="btn bg-success text-white">Logout</button></a>
                        
                    
                         
                    <?php endif; ?>
       
     
      </div>
    </div>
  </div>
</nav>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>


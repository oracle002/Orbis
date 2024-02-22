<?php

session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourest - Explore the World</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Comforter+Brush&family=Heebo:wght@400;500;600;700&display=swap"
    rel="stylesheet">

</head>

<body id="top">

 <?php
  include("header.php");
  ?>

      <section class="section destination">
        <div class="container">

          <p class="section-subtitle">Destinations</p>

          <h2 class="h2 section-title">Choose Your Place</h2>

          <ul class="destination-list">

           

<?php $sql = "SELECT * from tbltourpackages";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
     <li class="w-50">
              <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="destination-card">  
      <figure class="card-banner">
        
          <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" width="1140" height="1100" loading="lazy"
                    alt=" " class="img-cover">
        </figure>
        <div class="card-content">
          <h3 class="h3 card-title"><?php echo htmlentities($result->PackageName);?></h3>
          <p class="card-subtitle"></b> <?php echo htmlentities($result->PackageLocation);?></p>
        </div>
        </a>
     </li>

<?php }} ?>

           

        </div>
      </section>





   <?php
  include("footer.php");
  ?>

</body>

</html>
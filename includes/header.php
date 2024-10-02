  <?php
    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
    $host = $_SERVER[HTTP_HOST];
    $request_uri = $_SERVER[REQUEST_URI];
    $thisURL = $scheme . "://". $host . $request_uri;

    if ( !isset($product_code) ) { $product_code = "AB-CHASECAM"; }
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="<?php echo $_SESSION['shop']['name']; ?> <?php echo $_SESSION['shop']['url']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-round-xparent-150px-121x121.png" type="image/x-icon">
  <meta name="description" content="<?php echo $_SESSION['shop']['description']; ?>">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $thisURL; ?>">
  <meta property="og:title" content="<?php echo $_SESSION['products'][$product_code]['og_title']; ?>">
  <meta property="og:description" content="<?php echo $_SESSION['products'][$product_code]['og_description']; ?>">
  <meta property="og:image" content="<?php echo $scheme . "://". $host . "/" . $_SESSION['products'][$product_code]['og_image']; ?>">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?php echo $thisURL; ?>">
  <meta property="twitter:title" content="<?php echo $_SESSION['products'][$product_code]['og_title']; ?>">
  <meta property="twitter:image" content="<?php echo $scheme . "://". $host . "/" . $_SESSION['products'][$product_code]['og_image']; ?>">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i&amp;display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i&display=swap">
  </noscript>
  <link rel="preload" as="style" href="assets/site/css/mbr-additional.css">
  <link rel="stylesheet" href="assets/site/css/mbr-additional.css" type="text/css">
  

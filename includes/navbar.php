<section class="menu cid-s48OLK6784" once="menu" id="menu1-q">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="<?php echo $_SESSION['shop']['scheme'] . '://' . $_SESSION['shop']['url']; ?>">
                        <img src="assets/images/logo-round-xparent-150px-121x121.png" alt="<?php echo $_SESSION['shop']['name']; ?>" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-warning display-7" href="<?php echo $_SESSION['shop']['scheme'] . '://' . $_SESSION['shop']['url']; ?>"><?php echo $_SESSION['shop']['name']; ?>™</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item dropdown"><a class="nav-link link text-primary dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                            <a class="text-primary dropdown-item display-4" href="order.php">Chase Camera</a>
                            <a class="text-primary dropdown-item display-4" href="gear.php">Pilot Gear</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="about.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="basket.php">
                            <span class="mobi-mbri mobi-mbri-shopping-bag mbr-iconfont mbr-iconfont-btn"></span>
                            <span class="basket-item-count"><?php echo $_SESSION['basket']->getTotalItem(); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<?php 
// display notice on shop pages if active
$thisPage = basename($_SERVER['PHP_SELF']);

if ( $_SESSION['shop']['shopwide_notice']['active'] === true && in_array($thisPage, $_SESSION['shop']['pages']) ) : ?>
    <section class="cid-shopnotice">
        <div class="container">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Notice:</strong> <?php echo $_SESSION['shop']['shopwide_notice']['message']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </section>
<?php endif; ?>

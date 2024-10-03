<section class="footer3 cid-s9avVAl6ED" once="footers" id="footer3-m">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="contact.php">Contact</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="ordering.php">Ordering</a>
                    </li>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="stickers.php">Free stickers</a>
                    </li>
                </ul>
            </div>
            <div class="row payment-row text-center mb-3">
                <?php require_once 'includes/payment.php'; ?>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2"> 
                    <div class="soc-item">
                        <a href="https://www.facebook.com/" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/channel/" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.instagram.com/" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    &copy; Copyright <?php echo date("Y"); ?> <?php echo $_SESSION['shop']['name']; ?>. All Rights Reserved.
                </p>
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    Powered by <a href="https://github.com/billz/simple-commerce">Simple Commerce</a>.
                </p>
                </p>

            </div>
        </div>
    </div>
</section>


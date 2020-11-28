<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="<?= get_option( 'twitter-social')?>">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?= get_option( 'facebook-social')?>">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?= get_option( 'linkedin-social')?>">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?= get_option( 'github-social')?>">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website <?= date( 'Y' ); ?></p>
                <p class="copyright text-muted" style="font-size: 20px;">Copyright &copy; <span style="font-size: 25px; color: #0d66c2"><?= get_option( 'footer-copy');?> </span><span style="font-size: 25px; color: #00A8EF"><?= date( 'Y' ); ?></span></p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<!--<script src="--><? //= get_template_directory_uri();?><!--/vendor/jquery/jquery.min.js"></script>-->
<!--<script src="--><? //= get_template_directory_uri();?><!--/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

<!-- Custom scripts for this template -->
<!--<script src="--><? //= get_template_directory_uri();?><!--/js/clean-blog.min.js"></script>-->

<?php wp_footer(); //introduce wordpress ?>

</body>

</html>

<!-- footer -->
<footer id="global-footer" role="contentinfo" class="has-border">

    <!-- logo -->
    <a href="<?= home_url(); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-1.svg" alt="Logo" class="footer-logo"></a>
    <!-- /logo -->
    <div class="footer-links">
        <ul>
            <li class="inline-block uppercase date"><a href=" http://theplantnewspaper.com/2016/09/water-the-plant/" itemprop="email">Write for the plant</a>
            </li>
			<li class="inline-block uppercase date"><a href="<?= home_url(); ?>/submit" itemprop="article">Submit Direct</a>
            </li>
			<li class="inline-block uppercase date"><a href="<?= home_url();?>/style-guide" itemprop="article">Style Guide</a>
            </li>
            <li class="inline-block uppercase date"><a href="mailto:admin@theplantnewspaper.com" itemprop="email">Report an issue</a>
            </li>
            <li class="inline-block uppercase date"><a href="<?= home_url(); ?>/staff">The Staff</a>
            </li>
			<li class="inline-block uppercase date"><a href="<?= home_url(); ?>/privacy-policy">Privacy Policy</a>
            </li>
            <li class="inline-block uppercase date"><a href="http://dawsonstudentunion.ca/" memberOf="Dawson Student Union">DSU</a>
            </li>
            <li class="inline-block uppercase date"><a href="http://issuu.com/theplant">Issuu</a>
            </li>
            <li class="inline-block uppercase date"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a>
            </li>
            <li class="inline-block uppercase date"><a href="http://www.dawsoncollege.qc.ca/">Dawson College</a>
            </li>
			<li class="inline-block uppercase date"><a href="https://soundcloud.com/the-plant-newspaper">SoundCloud</a>
            </li>
			<li class="inline-block uppercase date"><a href="https://www.facebook.com/theplantnewspaper/">Facebook</a>
            </li>
        </ul>
    </div>
    <hr />
    <!-- copyright -->
    <p class="copyright">
        &copy;
        <?php echo date( 'Y'); ?>
        <span itemprop="publisher"><?php bloginfo('name'); ?></span>. The content displayed here represents solely the views of the content authors, and not necessarily the stance of
        <?php bloginfo('name'); ?> and its staff. The material on this site may not be reproduced, distributed, transmitted, or otherwise used, except with the prior written permission of <a itemprop="email" class="underline" href="mailto:contact@theplantnewspaper.com">The Plant</a> and the author. 

    </p>
    <!-- /copyright -->
</footer>
<!-- /footer -->

</div>
<!-- /wrapper -->

<?php wp_footer(); ?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-69152759-1', 'auto');
ga('send', 'pageview');</script>
</body>

</html>
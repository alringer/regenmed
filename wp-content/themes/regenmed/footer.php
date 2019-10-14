<?php 
$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
// This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
$max_chars = 180;

$menuID = $menuLocations['footer-menu']; //get ID of the menu
$footerNav = wp_get_nav_menu_items($menuID);

$pagesMenuID = $menuLocations['footer-pages-menu']; //get ID of the menu
$footerPagesNav = wp_get_nav_menu_items($pagesMenuID);
// foreach ($arr as $key => $value) {
//     // $arr[3] will be updated with each value from $arr...
//     echo "{$key} => {$value} ";
//     print_r($arr);
// }
 ?>
            <!-- footer -->
			<footer class="footer" role="contentinfo">
                <div class="footer__newsletter rgn-appear-animation">
                    <h1 class="footer__newsletter__title">Join Our Newsletter</h1>
                    <p class="footer__newsletter__message">Receive regular observations on the evolving Regenerative Medicine market.</p>
                    <?php echo do_shortcode('[mc4wp_form]'); ?>
                    <!-- <form method="POST" class="footer__newsletter__form">
                        <input type="text" class="footer__newsletter__form__email" name="email" placeholder="Email address">
                        <button type="submit" class="footer__newsletter__form__submit"><i class="icon icon-sm icon-right-arrow-send"></i></button>
                    </form> -->
                    <p class="footer__newsletter__message">2019 Regen Med - All Rights Reserved</p>
                </div>
                <div class="footer__links rgn-appear-animation">
                    <div class="footer__links__section">
                        <h4 class="footer__links__section__name">Services</h4>
                        <ul class="footer__links__section__list">
                        <?php                        
                        for ($i = 0; $i < count($footerNav); $i++) {
                            $post = get_post($footerNav[$i]->object_id);
                        ?>
                            <li class="footer__links__section__list__item">
                                <a class="footer__links__section__list__link" href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                            </li>                        
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="footer__links__section">
                        <h4 class="footer__links__section__name">Resources</h4>
                        <ul class="footer__links__section__list">
                        <?php                        
                        for ($i = 0; $i < count($footerPagesNav); $i++) {
                            $page = get_post($footerPagesNav[$i]->object_id);
                        ?>
                            <li class="footer__links__section__list__item">
                            <a class="footer__links__section__list__link" href="<?php echo get_permalink($page->ID) ?>"><?php echo $page->post_title ?></a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                </div>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /main-contaniner -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js" integrity="sha384-mUwnAhqfq+AAZqzGDOOBVHSyB6nCxEvLpD9hkd5FN3ws2bZpssxPtDsfdH20Kiom" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/plugins/animation.gsap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js"></script>
		<?php wp_footer(); ?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


	</body>
</html>

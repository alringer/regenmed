<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage RegenMed
 * @since 1.0.0
 */

$slideImage = get_theme_mod('hero_image_slide1');
$slide2MainImage = get_theme_mod('hero_image_slide2_main');
$slide2BusinessImage = get_theme_mod('hero_image_slide2_business');
$slide2ClinicalImage = get_theme_mod('hero_image_slide2_clinical');
$slide2ScienceImage = get_theme_mod('hero_image_slide2_science');
$slide2CommunicationsImage = get_theme_mod('hero_image_slide2_communications');

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
            <section id="heroJack" class="hero hero--jacked">
                <div id="heroSlide1" class="hero__slide hero__slide--first" <?php if($slideImage){ ?> style="background-image:url(' <?php echo $slideImage ?>')" <?php } ?> >
                    Slide1
                    <div class="hero__slide__text">
                        <p class="hero__slide__text__top">
                            <?php 
                                echo get_theme_mod('hero_title','We co-invest in establishing, operating and expanding');
                            ?>
                        </p>
                        <p class="hero__slide__text__bottom">
                            <?php 
                                echo get_theme_mod('hero_subtitle','Regenerative Medicine Centers of Excellence');
                            ?>
                        </p>
                    </div>
                </div>
                <div id="heroSlide2" class="hero__slide hero__slide--disciplines">
                    <section class="hero__slide--disciplines__section hero__slide--disciplines__section--main" <?php if($slide2MainImage){ ?> style="background-image:url(' <?php echo $slide2MainImage ?>')" <?php } ?> >
                        <p class="hero__slide--disciplines__section--main__title">RMCE’s are built on the foundation of four integrated disciplines</p>
                    </section>
                    <div class="hero__slide--disciplines__subsections">
                        <section class="hero__slide--disciplines__subsection hero__slide--disciplines__subsection--active">
                            <div class="hero__slide--disciplines__subsection__background" <?php if($slide2BusinessImage){ ?> style="background-image:url(' <?php echo $slide2BusinessImage ?>')" <?php } ?> ></div>
                            <div class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__info">
                                <p class="hero__slide--disciplines__subsection__title">
                                    Business
                                </p>
                                <div class="hero__slide--disciplines__subsection__description">
                                    <p>Modest capital requirements, enduring equity value.</p>
                                    <a href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                                </div>
                            </div>
                            <button class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__trigger" id="heroCircleTrigger1" data-number="1"></button>
                        </section>
                        <section class="hero__slide--disciplines__subsection">
                            <div class="hero__slide--disciplines__subsection__background" <?php if($slide2ClinicalImage){ ?> style="background-image:url(' <?php echo $slide2ClinicalImage ?>')" <?php } ?> ></div>
                            <div class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__info">
                                <p class="hero__slide--disciplines__subsection__title">
                                    Clinical
                                </p>
                                <div class="hero__slide--disciplines__subsection__description">
                                    <p>Standardized, product agnostic, and regulatorily-compliant procedures.</p>
                                    <a href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                                </div>
                            </div>
                            <button class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__trigger" id="heroCircleTrigger3" data-number="3"></button>
                        </section>
                        <section class="hero__slide--disciplines__subsection">
                            <div class="hero__slide--disciplines__subsection__background" <?php if($slide2ScienceImage){ ?> style="background-image:url(' <?php echo $slide2ScienceImage ?>')" <?php } ?> ></div>
                            <div class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__info">
                                <p class="hero__slide--disciplines__subsection__title">
                                    Science
                                </p>
                                <div class="hero__slide--disciplines__subsection__description">
                                    <p>Predictable outcomes, correlatable to Pre, Peri and Post-Tx evidence.</p>
                                    <a href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                                </div>
                            </div>
                            <button class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__trigger" id="heroCircleTrigger2" data-number="2"></button>
                        </section>
                        <section class="hero__slide--disciplines__subsection">
                            <div class="hero__slide--disciplines__subsection__background" <?php if($slide2CommunicationsImage){ ?> style="background-image:url(' <?php echo $slide2CommunicationsImage ?>')" <?php } ?> ></div>
                            <div class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__info">
                                <p class="hero__slide--disciplines__subsection__title">
                                    Communications
                                </p>
                                <div class="hero__slide--disciplines__subsection__description">
                                    <p>Sustainable patient and professional marketing tactics.</p>
                                    <a href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                                </div>
                            </div>
                            <button class="hero__slide--disciplines__subsection__item hero__slide--disciplines__subsection__trigger" id="heroCircleTrigger4" data-number="4"></button>
                        </section>
                    </div>
                    <div class="hero__slide--disciplines__center">RMCE</div>
                </div>
                <div id="heroSlide3" class="hero__slide hero__slide--process">
                    <h1 class="hero__slide--process__title">Our Process</h1>
                    <div class="hero__slide--process__steps">
                        <div class="hero__slide--process__step">
                            <div class="hero__slide--process__step__header">
                                <p class="hero__slide--process__step__header__number">01</p>
                                <img src="<?php echo get_template_directory_uri()  ?>/img/icons/discover.svg" class="hero__slide--process__step__header__icon">
                            </div>
                            <div class="hero__slide--process__step__title">Discover</div>
                            <div class="hero__slide--process__step__description">
                                Understanding the needs and involvement of the medical centers and medical professionals. 
                            </div>
                        </div>
                        <div class="hero__slide--process__step">
                            <div class="hero__slide--process__step__header">
                                <p class="hero__slide--process__step__header__number">02</p>
                                <img src="<?php echo get_template_directory_uri()  ?>/img/icons/establish.svg" class="hero__slide--process__step__header__icon">
                            </div>
                            <div class="hero__slide--process__step__title">Establish</div>
                            <div class="hero__slide--process__step__description">
                                Providing expertise and leveraging science, clinical, marketing, and business services to consult and enhance centers.
                            </div>
                        </div>
                        <div class="hero__slide--process__step">
                            <div class="hero__slide--process__step__header">
                                <p class="hero__slide--process__step__header__number">03</p>
                                <img src="<?php echo get_template_directory_uri()  ?>/img/icons/legacy.svg" class="hero__slide--process__step__header__icon">
                            </div>
                            <div class="hero__slide--process__step__title">Create a Legacy</div>
                            <div class="hero__slide--process__step__description">
                                At RegenMed building a legacy of medical professionals is our promise. 
                            </div>
                        </div>
                    </div>
                    <a href="#" class="rgn-button hero__slide--process__action">BEGIN THE PROCESS</a>
                </div>
                <div id="heroIndicator" class="hero__indicator">
                    <div class="hero__indicator__bar"></div>
                    <div id="heroPageNumber" class="hero__indicator__page">01</div>
                </div>
            </section>
            <div id="" class="standard-scroll">
                <?php                    
                    include("includes/sections/our-work.php");
                ?>
                <?php                    
                    include("includes/sections/literature.php");
                ?>
                <?php                    
                    include("includes/sections/ebooks.php");
                ?>
            </div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php
get_footer();

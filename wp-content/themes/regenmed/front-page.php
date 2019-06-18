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

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
            <section id="heroJack" class="hero hero--jacked">
                <div id="heroSlide1" class="hero__slide hero__slide--first">
                    Slide1
                    <div class="hero__slide__text">
                        <p class="hero__slide__text__top">We co-invest in establishing, operating and expanding</p>
                        <p class="hero__slide__text__bottom">Regenerative Medicine Centers of Excellence</p>
                    </div>
                </div>
                <div id="heroSlide2" class="hero__slide hero__slide--disciplines">
                    <section class="hero__slide--disciplines__section hero__slide--disciplines__section--main">
                        <p class="hero__slide--disciplines__section--main__title">RMCE’s are built on the foundation of four integrated disciplines</p>
                    </section>
                    <div class="hero__slide--disciplines__subsections">
                        <section class="hero__slide--disciplines__subsection hero__slide--disciplines__subsection--active">
                            <div class="hero__slide--disciplines__subsection__background"></div>
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
                            <div class="hero__slide--disciplines__subsection__background"></div>
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
                            <div class="hero__slide--disciplines__subsection__background"></div>
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
                            <div class="hero__slide--disciplines__subsection__background"></div>
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
                <section class="rgn-our-work">
                    <h1 class="rgn-section-title">Our Work</h1>
                    <div class="rgn-our-work__body">
                        <div class="rgn-our-work__body__image rgn-appear-animation">
                            <img src="<?php echo get_template_directory_uri()?>/img/frontpage/our-work/screencapture-regain-galeazzi-2019-04-18-10-34-24.png">
                        </div>
                        <div class="rgn-out-work__body__info rgn-appear-animation">
                            <div id="ourWorkSlides" class="rgn-out-work__body__info__slides">
                                <div class="rgn-out-work__body__info__slide rgn-out-work__body__info__slide--active">
                                    <h2 class="rgn-out-work__body__info__title">RE.GA.IN</h2>
                                    <h3 class="rgn-out-work__body__info__subtitle">Overview</h3>
                                    <p class="rgn-out-work__body__info__description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                    <a href="#" class="rgn-out-work__body__info__action rgn-button--blue">
                                        READ CASE STUDY
                                    </a>
                                </div>
                                <div class="rgn-out-work__body__info__slide">
                                    <h2 class="rgn-out-work__body__info__title">RE.GA.IN</h2>
                                    <h3 class="rgn-out-work__body__info__subtitle">Overview 2</h3>
                                    <p class="rgn-out-work__body__info__description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                    <a href="#" class="rgn-out-work__body__info__action rgn-button--blue">
                                        READ CASE STUDY
                                    </a>
                                </div>
                                <div class="rgn-out-work__body__info__slide">
                                    <h2 class="rgn-out-work__body__info__title">RE.GA.IN</h2>
                                    <h3 class="rgn-out-work__body__info__subtitle">Overview 3</h3>
                                    <p class="rgn-out-work__body__info__description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </p>
                                    <a href="#" class="rgn-out-work__body__info__action rgn-button--blue">
                                        READ CASE STUDY
                                    </a>
                                </div>
                            </div>
                            <div class="rgn-put-work__body__info__pagination">
                                <button class="rgn-put-work__body__info__pagination__page rgn-put-work__body__info__pagination__page--active" data-page="1"></button>
                                <button class="rgn-put-work__body__info__pagination__page" data-page="2"></button>
                                <button class="rgn-put-work__body__info__pagination__page" data-page="3"></button>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="rgn-literature">
                    <h1 class="rgn-literature-title rgn-section-title">Literature</h1>
                    <div class="rgn-literature__left">
                        <article class="rgn-literature__article rgn-literature__article--main rgn-appear-animation">
                            <div class="rgn-literature__article__image rgn-tablet-start" style="background-image:url('<?php echo get_template_directory_uri()?>/img/frontpage/literature/literature1-tablet.png')"></div>
                            <div class="rgn-literature__article__image rgn-mobile-only" style="background-image:url('<?php echo get_template_directory_uri()?>/img/frontpage/literature/literature1.png')"></div>
                            <div class="rgn-literature__article__info">
                                <div class="rgn-literature__article__type">BLOG</div>
                                <div class="rgn-literature__article__title">Balancing Safety</div>
                                <div class="rgn-literature__article__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tempus risus. </div>
                            </div>
                        </article>
                        <article class="rgn-literature__article rgn-literature__article--white-image rgn-appear-animation">
                            <div class="rgn-literature__article__info">
                                <div class="rgn-literature__article__type">WHITE PAPERS</div>
                                <div class="rgn-literature__article__title">Title</div>
                                <div class="rgn-literature__article__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tempus.</div>
                            </div>
                            <div class="rgn-literature__article__image" style="background-image:url('<?php echo get_template_directory_uri()?>/img/frontpage/literature/literature2.png')"></div>
                        </article>
                    </div>
                    <div class="rgn-literature__right">
                        <article class="rgn-literature__article rgn-literature__article--white-image rgn-appear-animation">
                        <div class="rgn-literature__article__image rgn-tablet-start" style="background-image:url('<?php echo get_template_directory_uri()?>/img/frontpage/literature/literature3.png')"></div>
                            <div class="rgn-literature__article__info">
                                <div class="rgn-literature__article__type">WHITE PAPERS</div>
                                <div class="rgn-literature__article__title">Title</div>
                                <div class="rgn-literature__article__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tempus.</div>
                            </div>
                        </article>
                        <article class="rgn-literature__article rgn-literature__article--black rgn-appear-animation">
                            <div class="rgn-literature__article__info">
                                <div class="rgn-literature__article__type">BLOG</div>
                                <div class="rgn-literature__article__title">Balancing Safety</div>
                                <div class="rgn-literature__article__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tempus risus. Curabitur finibus vestibulum risus, quis aliquam sapien iaculis in</div>
                            </div>
                        </article>
                        <article class="rgn-literature__article rgn-literature__article--white-image rgn-literature__article--white-image--reverse rgn-appear-animation">
                            <div class="rgn-literature__article__image rgn-tablet-start" style="background-image:url('<?php echo get_template_directory_uri()?>/img/frontpage/literature/literature4@2x.png')"></div>
                            <div class="rgn-literature__article__info">
                                <div class="rgn-literature__article__type">WHITE PAPERS</div>
                                <div class="rgn-literature__article__title">Title</div>
                                <div class="rgn-literature__article__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tempus.</div>
                            </div>
                        </article>
                    </div>
                    <a class="rgn-literature__read-more rgn-read-more-link" href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                </section>
                <section class="rgn-ebooks">
                    <div class="rgn-ebooks__left rgn-appear-animation">
                        <h2 class="rgn-ebooks__title">
                            Building a Successful Regenerative Medicine Practice eBook
                        </h2>
                        <h3 class="rgn-ebooks__subtitle">
                            Overview
                        </h3>
                        <p class="rgn-ebooks__body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <button class="rgn-button--dark-gray rgn-ebooks__action">DOWNLOAD THE EBOOK</button>
                    </div>
                    <div class="rgn-ebooks__right rgn-appear-animation">
                        <img class="rgn-ebooks__image" src="<?php echo get_template_directory_uri() ?>/img/frontpage/ebook/ebook.png">
                    </div>
                </section>
            </div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php
get_footer();

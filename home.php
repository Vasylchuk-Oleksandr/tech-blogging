<?php
/*
Template Name: home

<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine
 * doesn't know which template to use (e.g. 404 error)
 */
?>
<?php get_header(); // This fxn gets the header.php file and renders it ?>
<section class="book-display-area">
          <div class="book-image" style="background-image: url('<?php the_field('image');?>')"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-7 align-self-center">
                    <div class="book-text">
                        <h1 class="title mt-0"><?php the_field('title');?></h1>
                        <p class="deskription mb-4"><?php the_field('deskription');?></p>
                        <a href="#" class="btn book-btn default-btn-style"><?php the_field('discover');?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">

		<section>
    <div class="container">
        <h2 class="post__title"><?php the_field('title_post');?></h2>
        <div class="post">

        </div>
		<div class="load-more-button-wrapper">
			<button class="load-more-button">Load More</button>
		</div>
    </div>
</section>

        </div>
    </section>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
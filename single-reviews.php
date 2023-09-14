<?php
/*
Template Name: Single Reviews
Template Post Type: reviews
 */
get_header();?>

<div class="content-area">
    <main class="site-main">
        <div class="container">

            <?php
while (have_posts()): the_post();
    the_title('<h1>', '</h1>');
    ?>


			<div class="table-of-contents">
	            <h2>Table of contents</h2>
					                        <?php
    $content = get_the_content();
    $pattern = '/<h2.*?>(.*?)<\/h2>/';
    preg_match_all($pattern, $content, $matches);

    if (!empty($matches[1])) {
        echo '<ol>';
        foreach ($matches[1] as $match) {
            echo '<li>' . $match . '</li>';
        }
        echo '</ol>';
    }
    ?>



									        </div>
					        <div class="acf-fields">
			    <div class="logo__singl"><img src="<?php the_field('logo');?>" alt="Logo"></div>
			    <h4 class="name"><?php the_field('name');?></h4>
			    <div class="bonus"><?php the_field('bonus');?></div>
			    <div class="rating"><?php the_field('rating');?></div>
			    <div class="features__singl">
			        <?php
    $features = explode("\n", get_field('features'));

    if (!empty($features)) {
        echo '<ul>';
        foreach ($features as $feature) {
            $cleaned_feature = trim($feature);
            if (!empty($cleaned_feature)) {
                echo '<li>' . $cleaned_feature . '</li>';
            }
        }
        echo '</ul>';
    }
    ?>
			    </div>

			    <div class="link link__singl">
			        <a href="<?php the_field('link');?>"><?php the_field('text_link');?></a>
			    </div>
			</div>
			<div class="single-review-content">
			    <?php the_content();?>
			</div>


				            <?php endwhile;?>
        </div>
    </main>
</div>

<?php get_footer();?>

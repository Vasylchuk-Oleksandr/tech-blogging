<?php
/**
 * Help Panel.
 *
 * @package Tech Blogging
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left visible">
	<h4><?php _e( 'Theme Setup & Walkthrough', 'tech-blogging' ); ?></h4>
	
	<!-- Screenshot of video -->
	
	<div>
		<a href="<?php echo esc_url( 'https://www.smarterthemes.com/theme-tech-blogging/' );?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/inc/getting-started/images/tech_blogging_screenshot.jpg' ); ?>"></a>
	</div>

	
	<br>

	<a class="button button-primary" style="width:100%; text-align:center;" href="<?php echo esc_url( 'https://www.smarterthemes.com/theme-tech-blogging/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'tech-blogging' ); ?>" target="_blank">            <?php esc_html_e( 'Learn More About Tech Blogging Pro >>', 'tech-blogging' ); ?>
        </a>

	<hr/>

	
</div><!-- .panel-left -->
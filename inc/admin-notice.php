<?php
if( ! function_exists( 'tech_blogging_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function tech_blogging_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'tech_blogging_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    if( 'themes.php' == $pagenow && !$meta ){
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }
        if( is_network_admin() ){
            return;
        }
        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>
            <div class="smarterthemes welcome-message notice notice-info">
               <div class="notice-wrapper">
                   <div class="notice-text">
                       <h3><?php printf( __( 'Thank you for installing %1$s Theme.', 'tech-blogging' ), esc_html( $name ) ); ?></h3>
                       <p><?php esc_html_e( 'Use the button below to turn on advanced blogging and AI auto posting features.', 'tech-blogging'  ) ; ?></p>
                       <p>
                           <a href="<?php echo esc_url( 'https://www.quickwrite.ai/blog-special/' );?>" class="button button-primary" style="text-decoration: none;" target="_blank">
                               <?php esc_html_e( 'Get started with AutoPosting', 'tech-blogging' ); ?>
                           </a>
                       </p>
                       <p class="dismiss-link"><strong><a href="?tech-blogging-update-notice=1"><?php esc_html_e( 'Dismiss','tech-blogging' ); ?></a></strong></p>
                   </div>
               </div>
           </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'tech_blogging_admin_notice' );
if( ! function_exists( 'tech_blogging_update_admin_notice' ) ) :
    /**
     * Updating admin notice on dismiss
    */
    function tech_blogging_update_admin_notice(){
        if ( isset( $_GET['tech-blogging-update-notice'] ) && $_GET['tech-blogging-update-notice'] = '1' ) {
            update_option( 'tech_blogging_admin_notice', true );
        }
    }
endif;
add_action( 'admin_init', 'tech_blogging_update_admin_notice' );

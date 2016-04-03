<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 2.0
 */
function MCFunctions_render_submenu_page() {

    // Settings update message
    if ( isset( $_GET['settings-updated'] ) ) :
        ?>
            <div id="message" class="updated">
                <p><?php _e( 'Custom functions updated successfully.', 'mcfunctions' ); ?></p>
            </div>
        <?php
    endif;

    // Error message
    $error = get_option( 'anarcho_cfunctions_error' );
    if ( $error == '1' ) :
        ?>
            <div id="message" class="error">
                <p>
                    <?php _e( 'Sorry, but your code causes a "Fatal error", so it is not applied!', 'MCFunctions' ); ?><br/>
                    <?php _e( 'Please, check the code and try again.', 'MCFunctions' ); ?>
                </p>
            </div>
        <?php
    endif;

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'My Custom Functions', 'MCFunctions' ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur "Berserkr" Gareginyan</a>', 'MCFunctions' ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', 'MCFunctions' ) ?></a></h3>
                        <div class="inside">
                            <p><?php _e( 'This plugin allows you to easily and safely add your own functions, snippets or any custom code to your website.', 'MCFunctions' ) ?></p>
                        </div>
                    </div>

                    <div id="using" class="postbox">
                        <h3 class="title"><?php _e( 'Using', 'MCFunctions' ) ?></a></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, enter your custom functions, then click "Save Changes". It\'s that simple!', 'MCFunctions' ) ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', 'MCFunctions' ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'If you want more options then tell me and I will be happy to add it.', 'MCFunctions' ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', 'MCFunctions' ) ?></h3>
                        <div class="inside">
                            <img src="<?php echo plugins_url('thanks.png', __FILE__); ?>">
                            <p><?php _e( 'If you like this plugin and find it useful, help me to make this plugin even better and keep it up-to-date.', 'MCFunctions' ) ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', 'MCFunctions' ) ?></p>
                        </div>
                    </div>

                    <div id="freelance" class="postbox">
                        <h3 class="title"><?php _e( 'Freelance', 'MCFunctions' ) ?></h3>
                        <div class="inside">
                            <img src="<?php echo plugins_url('author.png', __FILE__); ?>">
                            <p><?php _e( 'Hello, my name is Arthur and I\'m a freelance web designer and developer.', 'MCFunctions' ) ?></p>
                            <p><?php _e( 'Share your thoughts with me. You may have a brilliant idea in your mind and I can make it happen, so let’s get started!', 'MCFunctions' ) ?></p>
                            <p><a href="http://www.arthurgareginyan.com/" target="_blank">www.arthurgareginyan.com</a></p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END-SIDEBAR -->

            <!-- FORM -->
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">

                        <form name="anarcho_cfunctions-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'anarcho_cfunctions_settings_group' ); ?>

                            <?php
                                // Declare variables
                                $options = get_option( 'anarcho_cfunctions_settings' );
                                $content = isset( $options['anarcho_cfunctions-content'] ) && ! empty( $options['anarcho_cfunctions-content'] ) ? $options['anarcho_cfunctions-content'] : '/* Enter Your Custom Functions Here */';
                            ?>
                            <div class="postbox">
                                <h3 class="title">
                                    <label for="anarcho_cfunctions_settings[anarcho_cfunctions-content]" ><?php _e( 'Functions', 'MCFunctions' ) ?></label>
                                </h3>
                                <div class="inside">
                                    <textarea name="anarcho_cfunctions_settings[anarcho_cfunctions-content]" id="anarcho_cfunctions_settings[anarcho_cfunctions-content]" ><?php echo esc_attr( $content ); ?></textarea>
                                </div>
                            </div>

                            <?php submit_button( __( 'Save Changes', 'MCFunctions' ), 'primary', 'submit', true ); ?>

                        </form>
                        <!-- END-FORM -->

                    </div>
                </div>
            </div>

        </div>

	</div>
	<?php
}
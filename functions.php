<?php

//for responsive menu start
//require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';

function register_navwalker() {
	require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

//If you encounter errors with the above code use a check like this to return clean errors to help diagnose the problem.

if ( ! file_exists( get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php' ) ) {
	// File does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// File exists... require it.
	require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}

//for responsive menu end


add_action( 'after_setup_theme', 'code4web_bootstraping' );

function code4web_bootstraping() {
	//add_theme_support( 'post-formats');
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );
	add_theme_support( 'post-thumbnails' );
	//add_theme_support( 'post-thumbnails', array('post'));//only post
	//add_theme_support( 'post-thumbnails', array('page'));//only page
	add_theme_support( 'title-tag' );

	//custom logo title
	//add_theme_support('custom-logo');
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 100,
		'flex-width'  => true,
		'flex-height' => true
	) );

	//custom header image
	//add_theme_support('custom-header');
	add_theme_support( 'custom-header', array(
		'header-text'        => true,
		'default-text-color' => '#fff'
	) );
}

//loads scripts through function
add_action( 'wp_enqueue_scripts', 'code4web_enqueue_scripts' );

function code4web_enqueue_scripts() {
	//css script
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css' );
	wp_enqueue_style( 'fonts-lora', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' );
	wp_enqueue_style( 'fonts-family', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
	wp_enqueue_style( 'clean-blog', get_template_directory_uri() . '/css/clean-blog.min.css' );
	wp_enqueue_style( 'core', get_stylesheet_uri() );//link style.css

	//js script
	//wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), 1.0, true );//false header
	wp_enqueue_script( 'clean-blog', get_template_directory_uri() . '/js/clean-blog.min.js', array( 'jquery' ), 1.0, true );//false header
}

//register menu
register_nav_menus( array(
//	'primary' => __( 'Primary Menu', 'cleanblog' ),
	'header' => __( 'Header Menu', 'cleanblog' ),
) );

//custom header image
function code4weds_custom_header_image() {
	if ( current_theme_supports( 'custom-header' ) ) {
		?>

		<?php if ( is_home() ) { ?>
            <style>

                .masthead {
                    background-image: url('<?php header_image();?>') !important; /*inline priority problem solv*/
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                }
            </style>
		<?php } ?>
        <style>
            /*custom header title color change*/
            .default-title {
                color: #<?= get_header_textcolor();?>; /* #tag no space*/
                /*




            <?php if (!display_header_text()){?>
            display: none;





            <?php }?>     */

            <?php if (!display_header_text()){
			   echo 'display: none;';
			 }?>
            }
        </style>
	<?php }
}

add_action( 'wp_head', 'code4weds_custom_header_image' );


//Setting API Registration
function code4webs_theme_option_social_admin() {
//registered a section under setting general
	add_settings_section( 'theme-option', 'Footer Option', 'cb_footer_option_section', 'general' );

//registered a field under setting general option
	add_settings_field( 'twitter-social', 'Enter your twitter URL', 'twitter_option_callback', 'general', 'theme-option' );
	add_settings_field( 'facebook-social', 'Enter your facebook URL', 'facebook_option_callback', 'general', 'theme-option' );
	add_settings_field( 'linkedin-social', 'Enter your linkedin URL', 'linkedin_option_callback', 'general', 'theme-option' );
	add_settings_field( 'github-social', 'Enter your github URL', 'github_option_callback', 'general', 'theme-option' );

	//footer copyright
	add_settings_field( 'footer-copy', 'Enter your footer copyright', 'footercopy_option_callback', 'general', 'theme-option' );

	//register setting for database table
	register_setting( 'general', 'twitter-social' );
	register_setting( 'general', 'facebook-social' );
	register_setting( 'general', 'linkedin-social' );
	register_setting( 'general', 'github-social' );
	register_setting( 'general', 'footer-copy' );
}

function cb_footer_option_section() {
	echo '<span style="font-size: 16px; color: #d39e00">Please enter data for your footer social menu.</span>';
}

//social callback function
function twitter_option_callback() {
	?>
    <input type="text" class="regular-text ltr" name="twitter-social" id="tw_url"
           value="<?= get_option( 'twitter-social' ) ?>" placeholder="https://twitter.com/Selim Reza Swadhin">
<?php }

function facebook_option_callback() {
	?>
    <input type="text" class="regular-text ltr" name="facebook-social" id="fb_url"
           value="<?= get_option( 'facebook-social' ) ?>" placeholder="https://facebook.com/Selim Reza Swadhin">
<?php }

function linkedin_option_callback() {
	?>
    <input type="text" class="regular-text ltr" name="linkedin-social" id="ln_url"
           value="<?= get_option( 'linkedin-social' ) ?>" placeholder="https://linkedin.com/Selim Reza Swadhin">
<?php }

function github_option_callback() {
	?>
    <input type="text" class="regular-text ltr" name="github-social" id="gh_url"
           value="<?= get_option( 'github-social' ) ?>" placeholder="https://github.com/Selim-Reza-Swadhin">
<?php }

//footer copyright
function footercopy_option_callback() {
	?>
    <input type="text" class="regular-text ltr" name="footer-copy" id="gh_url"
           value="<?= get_option( 'footer-copy' ) ?>" placeholder="selimrezaswadhin.com">
<?php }

add_action( 'admin_init', 'code4webs_theme_option_social_admin' );


//custom posttype
function code4webs_testimonials() {
	register_post_type( 'code4webse', array(
		'labels'      => array(
			'name'               => 'Testimonial',
			'singular_name'      => 'Testimonial',
			'add_new'            => 'Add New Testimonial',
			'add_new_item'       => 'Add New Testimonial',
			'edit_item'          => 'Edit Testimonial',
			'all_items'          => 'All Testimonial',
			'not_found'          => 'Selim Post Not Found',
			'featured_image'     => 'Selim Featured Image',
			'set_featured_image' => 'Selim Set Featured Image',
			'name_admin_bar'        => __( 'Testimonial' ),
			'search_items'          => __( 'Search testimonial')

		),
		'public'      => true,
		'description' => 'Please add your testimonial here...',
		'supports'    => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'  => array( 'category', 'post_tag' ),
		'menu_icon'   => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_menu'          => true,
		'hierarchical'          => false,
        'publicly_queryable'    => true,
//        'show_in_menu'    => false,
	) );
}

add_action( 'init', 'code4webs_testimonials' );


//Replace Howdy Greeting
function replace_howdy_greeting( $wp_admin_bar ) {
	$my_account = $wp_admin_bar->get_node( 'my-account' );
	$newtitle   = str_replace( 'Howdy,', 'Welcome ', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id'    => 'my-account',
		'title' => $newtitle
	) );
}

add_filter( 'admin_bar_menu', 'replace_howdy_greeting', 12 );


//Replace Hi comma Greeting
function replace_hi_greeting( $wp_admin_bar ) {
	$my_account = $wp_admin_bar->get_node( 'my-account' );
	$newtitle   = str_replace( 'Hi,', 'Welcome', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id'    => 'my-account',
		'title' => $newtitle
	) );
}

add_filter( 'admin_bar_menu', 'replace_hi_greeting', 12 );


//Replace Howdy comma
//function wp_admin_bar_my_custom_account_menu($wp_admin_bar){
//	$user_id = get_current_user_id();
//	$current_user = wp_get_current_user();
//	$profile_url = get_edit_profile_url($user_id);

//	if (0 != $user_id){
//		/*Add the my account menu*/
//		$avatar = get_avatar( $user_id, 28);
//		$howdy = sprintf( __( 'Welcomeew %1$s'), $current_user->display_name);
//		$class = empty( $avatar) ? ' ' : 'with-avatar';


//		$wp_admin_bar->add_menu(array(
//			'id'=>'my-account',
//			'title'=>$howdy . $avatar,
//			'href'=>$profile_url,
//			'meta'=>array(
//				'class'=>$class
//			)
//		));
//}
//}


//add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11);

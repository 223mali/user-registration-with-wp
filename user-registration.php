<?php
/*
  Plugin Name: User Registration
  Description: Create Custom User Registration Form.
  Version: 1.0
  Author: Ernest Keita
 */

function mv_add_scripts(){
	
	
	    wp_enqueue_style( 'datepickercss', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' );
    wp_enqueue_script( 'datepicker', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' );
	
	wp_enqueue_style('reg-style', plugin_dir_url( __FILE__ ) . 'css/style.css');
		wp_enqueue_script('reg-js', plugin_dir_url( __FILE__ ) . 'js/main.js');
	
}
add_action('wp_enqueue_scripts', 'mv_add_scripts');
function registration_form( $username, $password, $fname, $lname,$phone,$dob ) {
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
	<div class="card-body">
	<div class="reg-wrapper">
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" class="woocommerce-form woocommerce-form-register register">

	<div class="form-row m-b-55">
		<div class="name">Name</div>
		<div class="value">
			<div class="row row-space">
				<div class="col-6">
					<div class="input-group-desc">
					<p id="name-row" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input required type="text" class="input--style-5 woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="fname"
						id="reg_fname"
						value="' . ( isset( $_POST['fname'] ) ? $fname : null ) . '" />
				</p>
						<label class="label--desc">first name <span
				class="required">*</span></label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group-desc">
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input required type="text" class="input--style-5 woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="lname"
						id="reg_lname"
						value="' . ( isset( $_POST['lname'] ) ? $lname : null ) . '" />
				</p>
						<label class="label--desc">last name <span
				class="required">*</span></label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-row">
		<div class="name">Email <span class="required">*</span></div>
		<div class="value">
			<div class="input-group">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input required type="email" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="username"
						id="reg_username"
						value="' . ( isset( $_POST['username'] ) ? $username : null ) . '" />
				</p>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="name">Password <span class="required">*</span></div>
		<div class="value">
			<div class="input-group">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<input required type="password" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="password"
			id="reg_password" autocomplete="new-password" />
	</p>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="name">Cell Phone <span class="required">*</span></div>
		<div class="value">
			<div class="input-group">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input required type="tel" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="phone"
						id="reg_phone"
						value="' . ( isset( $_POST['phone'] ) ? $phone : null ) . '" />
				</p>
			</div>
		</div>
	</div>

	<div class="form-row">
		<div class="name">Date of Birth <span class="required">*</span></div>
		<div class="value">
			<div class="input-group date">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input required data-provide="datepicker" type="text" class="woocommerce-Input woocommerce-Input--text input--style-5 input-text" name="dob"
						id="reg_dob" onkeydown="return false"
						value="' . ( isset( $_POST['dob'] ) ? $dob : null ) . '" />
						<div class="input-group-addon">
         <img src="http://ec2-3-85-11-127.compute-1.amazonaws.com/wp-content/uploads/2020/06/calendar.png" />
    </div>
						
				</p>
			</div>
		</div>
	</div>

	<div class="form-row p-t-20">
		<label class="label label--block">Accept our terms and conditions? <span
				class="required">*</span></label>
		<div class="p-t-15">
			<label class="radio-container m-r-55">Yes
				<input required type="radio" checked="checked" name="exist">
				<span class="checkmark"></span>
			</label>
			<label class="radio-container">No
				<input required type="radio" name="exist">
				<span class="checkmark"></span>
			</label>
		</div>
	</div>

	

	<p class="woocommerce-form-row form-row">
		<button type="submit" class=" btn btn-primary woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
			name="submit"
			value="" style="
    margin-left: auto;
    margin-right: auto;">Register</button>
	</p>

	

</form>
</div>
</div>
';
}

function registration_validation( $username, $password, $fname, $lname,$phone,$dob){
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( empty( $username ) || empty( $password ) || empty( $fname ) || empty( $lname ) || empty( $phone ) || empty( $dob ) ) {
    $reg_errors->add('field', 'Required form field is missing');
    }

    if ( username_exists( $username ) ){
        $reg_errors->add('user_name', 'Sorry, that username already exists!');
	}
	
	if ( email_exists( $username ) ){
        $reg_errors->add('user_name', 'Sorry, that email already exists!');
    }

    if ( !is_email( $username ) ) {
        $reg_errors->add( 'email_invalid', 'Email is not valid' );
    }

    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5' );
    }

    if ( is_wp_error( $reg_errors ) ) {
    
        foreach ( $reg_errors->get_error_messages() as $error ) {
        
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';
            echo '</div>';
            
        }
    
    }
}



function complete_registration() {
    global $reg_errors, $username, $password, $fname, $lname,$phone,$dob;
	echo $username;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $username,
        'user_pass'     =>   $password,
		'display_name'  =>   $fname . ' ' . $lname
        );
		$user_ID = wp_insert_user( $userdata );
		if($user_ID && !is_wp_error($user_ID)){
			$code = sha1( wp_generate_password());
			$activation_link = add_query_arg(array('activation_code'=> $code, 'uid'=> $user_ID), get_site_url() . '/user-activation');
			
// 			Adding the USER META Fields
			add_user_meta($user_ID, 'activation-code', $code,true);
			add_user_meta($user_ID, 'fname', $fname,false);
			add_user_meta($user_ID, 'lname', $lname,false);
			add_user_meta($user_ID, 'phone', $phone,false);
			add_user_meta($user_ID, 'dob', $dob,false);
			add_user_meta($user_ID, 'status','inactive',false);
			wp_mail( $username, 'Account Activation', 'Congratulations, your account was created successfully. HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
        wp_redirect(home_url('registration-success') );
 
		echo "
		<script> window.location.href = '". home_url('registration-success') . "'; </script>
		";
		}
		
	}
}


function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
		
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['phone'],
        $_POST['dob']
        );
         
        // sanitize user form input
        global $username, $password, $fname, $lname,$phone,$dob;
        $username   =   sanitize_text_field( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $fname =   sanitize_text_field( $_POST['fname'] );
        $lname  =   sanitize_text_field( $_POST['lname'] );
        $phone      =   sanitize_text_field( $_POST['phone'] );
        $dob        =   sanitize_text_field( $_POST['dob']);
		

        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $fname,
        $lname,
        $phone,
        $dob
        );
    }
 
    registration_form(
        $username,
        $password,
        $fname,
        $lname,
        $phone,
        $dob
        );
}


add_shortcode( 'mv_custom_registration', 'custom_registration_shortcode' );

function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}

if( ! function_exists( 'wp_authenticate' ) ){
    function wp_authenticate($username, $password){
		$username = sanitize_user($username);
    $password = trim($password);

    $user = apply_filters('authenticate', null, $username, $password);

    if ( $user == null ) {
        // TODO what should the error message be? (Or would these even happen?)
        // Only needed if all authentication handlers fail to return anything.
        $user = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));
    } elseif ( get_user_meta( $user->ID, 'status', true )&& get_user_meta( $user->ID, 'status', true ) != 'active' ) {
        $user = new WP_Error('activation_failed', __('<strong>ERROR</strong>: User is not activated.'));
    }

    $ignore_codes = array('empty_username', 'empty_password');

    if (is_wp_error($user) && !in_array($user->get_error_code(), $ignore_codes) ) {
        do_action('wp_login_failed', $username);
    }

    return $user;

	}
}


add_action( 'template_redirect', 'wpse8170_activate_user' );
function wpse8170_activate_user() {
    if ( is_page() && get_the_ID() == 1214) {
        $user_id = filter_input( INPUT_GET, 'uid', FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
        if ( $user_id ) {
			
            // get user meta activation hash field
            $code = get_user_meta( $user_id, 'activation-code', true );
            if ( $code == filter_input( INPUT_GET, 'activation_code' ) ) {
                delete_user_meta( $user_id, 'activation-code' );
				update_user_meta($user_id, 'status', 'active');
            }
        }
    }
}


require 'mailgun-php/vendor/autoload.php';
use Mailgun\Mailgun;

// function mv_send_mail($email, $activation_link){
	
	
// 	# Instantiate the client.
// 	$mgClient = new Mailgun('b712c3478738103deba867aab5370551-8b34de1b-a4c7db4c', 'https://api.mailgun.net/v3/sandboxd6c11bd2694a46079ef08bfa99f978a6.mailgun.org');
// 	$domain = "sandboxd6c11bd2694a46079ef08bfa99f978a6.mailgun.org";
// 	# Make the call to the client.
// 	$result = $mgClient->sendMessage($domain, array(
// 		'from'	=> 'keitaernest@gmail.com',
// 		'to'	=>  $email,
// 		'subject' => 'Account Activation',
// 		'text'	=> 'click on the following link to activate your account! '. $activation_link
// ));
// 	echo $result;
// 	return $result;
// }

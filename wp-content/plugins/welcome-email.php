<?php
/*
Plugin Name: Custom Welcome Email for Beta Testing
Plugin URI: http://students.iam.colum.edu/gwc
Description: Built for custom emails for user tesing
Version: 1.0
Author: IAM Team, Columbia College Chicago
Author URI: http://iam.colum.edu
*/

add_filter ("wp_mail_content_type", "my_awesome_mail_content_type");
function my_awesome_mail_content_type() {
	return "text/html";
}
	
add_filter ("wp_mail_from", "my_awesome_mail_from");
function my_awesome_mail_from() {
	return "directory@girlswhocode.com";
}
	
add_filter ("wp_mail_from_name", "my_awesome_mail_from_name");
function my_awesome_email_from_name() {
	//return "Girls Who Code Student/Alumni Directory";
}

if ( !function_exists('wp_new_user_notification') ) {
	function wp_new_user_notification($user_id, $plaintext_pass) {
		$user = new WP_User($user_id);
	
		$user_login = stripslashes($user->user_login);
		$user_email = stripslashes($user->user_email);
		
		$email_subject = "Welcome to the Girls Who Code Student/Alumni Directory";
		
		ob_start();
		
		?>
		<body style="margin: 0; padding: 0; text-align: center; background-image: url('http://www.goodspark.com/gwc/wp-content/uploads/2015/02/seamless-pattern-of-circuit-board-grey-2370.png'); color: #555; font-family: Helvetica, Arial, sans-serif" >
		<div style="background: #fdfffd; width: 600px; text-align: left; margin: 15px auto; padding: 15px;">
		<img src="http://www.goodspark.com/gwc/wp-content/uploads/2015/02/email-header.png" alt="Girls Who Code Student & Alumni Directory">
		<p>You have been selected to participate in the first round of user testing for the Girls Who Code Student & Alumni Network. </p>
	<p>Please <a href="http://www.goodspark.com/gwc" target="_blank">visit the site</a> and login using the following:<br />
	Username: <?php echo $user_login; ?><br />
	Password: <?php echo $plaintext_pass; ?></p>
	<p>Once you've logged in, click on your username, found in the top-right corner, then do the following: </p>
		<ul>
		<li>Upload a profile picture</li>
		<li>Update your privacy settings</li>
		<li>Write a testimonial about your experience with the GWC Summer Immersion program</li>
		<li>Select badges that apply to you</li>
		<li>Update the name of the college you plan on attending (if applicable)</li>
		<li>Update your minor (if applicable)</li>
		<li>Update your major (if applicable)</li>	
		</ul>
		
		<p>Once you have updated your profile, we would love to hear your thoughts on this process. Your feedback will help make this directory more user-friendly and easy to use. Please fill out a brief survey about your experience at <a href="https://docs.google.com/forms/d/1JS9KWqJb1lLM9WqylBnZVKglwafbU28R1FAlzYegsP0/viewform?usp=send_form" target="_blank">https://docs.google.com/forms/d/1JS9KWqJb1lLM9WqylBnZVKglwafbU28R1FAlzYegsP0/viewform?usp=send_form</a></p>
		
		<p>Thank you for your participation!</p>
		</div>
		<?php	
		$message = ob_get_contents();
		ob_end_clean();
	
		wp_mail($user_email, $email_subject, $message);
	}
}	
?>
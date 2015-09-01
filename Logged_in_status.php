<?php

function display_logged_in_status() {
  if ( !is_user_logged_in() ) {
    return '<span style="font-size: 21px; color: #219cab;">Hello, Guest.</span> In order to access all the features of this website please <a href="http://www.eastbayyad.org/jfed4/user-registration/" rel="nofollow">Register</a> or <a href="http://www.eastbayyad.org/jfed4/wp-login.php" rel="nofollow">Login</a>';
  } else {

    $current_user = wp_get_current_user();
    return '<span style="font-size: 21px; color: #219cab;">Welcome ' . $current_user->user_login . '</span> | ' . '<a href="http://www.eastbayyad.org/jfed4/user-profile/">Profile</a>' . ' | ' . '<a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>';
  }
}
add_shortcode('logged-in-status', 'display_logged_in_status');

?>
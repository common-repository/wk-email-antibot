<?php
/*
Plugin Name: wk-email-antibot
Plugin URI: http://www.oneconsult.dk
Description: Insert shortcode [antibot mail="your@email.com"] in a post/page to display an email address. [antibot mailto="your@email.com"] will display a clickable link mail.
Version: 1.0
Author: Emil Arffmann Hansen
Author URI: http://www.oneconsult.dk

Usage:
      [antibot mail="your@email.com"] will display the email address
      [antibot mailto="your@email.com"] will display an mailto email address

*/
/* -------------------------------------------------------------------------- */
// Shortcode enabling
function wk_email_antibot_shortcode($args)
{
  $email = $args["mail"];
  $mailto = $args["mailto"];
  ob_start();
  if ($email)
  {
    echo antispambot($email);
  }
  if ($mailto)
  {
    echo '<a href="mailto:'.antispambot($mailto).'">'.antispambot($mailto).'</a>';
  }
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
};
add_shortcode('antibot', 'wk_email_antibot_shortcode');
/* -------------------------------------------------------------------------- */
?>
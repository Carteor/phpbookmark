<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Add bookmark');
echo 'You signed in as '.$_SESSION['valid_user'].'<br />';
display_add_bm_form();
do_html_footer();
?>

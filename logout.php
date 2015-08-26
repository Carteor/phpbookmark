<?php
require_once('bookmark_fns.php');
session_start();
$old_user = $_SESSION['valid_user'];

unset($_SESSION['valid_user']);
$result_dest = session_destroy();

do_html_header('Exit');
if (!empty($old_user)) {
    if ($result_dest) {
        echo 'Successfully exit the system.<br />';
        do_html_url('login.php', 'Sign In');
    } else {
        echo 'Exit from the system is not possible.<br />';
    }
} else {
    echo 'You haven\'t signed in, so can\'t exit.<br />';
    do_html_url('login.php', 'Log In');
}

display_user_menu();
do_html_footer();
?>
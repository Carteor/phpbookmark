<?php
require_once('bookmark_fns.php');
do_html_header('Reset password');

$username = $_POST['username'];
try {
    $password = reset_password($username);
    notify_password($username, $password);
    echo 'New password was sent to your email, '
        .'which you wrote while registering.<br />';
}
catch (Exception $e) {
    echo 'Password can\'t be reset. '
        .'Please, try again later.';
}
do_html_url('login.php', 'Exit');
do_html_footer();
?>
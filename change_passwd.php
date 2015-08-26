<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Change password');

$old_password = $_POST['old_passwd'];
$new_passwd = $_POST['new_passwd'];
$new_passwd2 = $_POST['new_passwd2'];

try {
    check_valid_user();
    if (!filled_out($_POST)) {
        throw new Exception('You haven\'t filled form properly.'
            .'Please, try again.');
    }
    if ($new_passwd != $new_passwd2) {
        throw new Exception('Entered passwords do not match. '
            .'Can\'t change.');
    }
    if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
        throw new Exception('A new password must have a length of at least 6 characters. '
            .'Try again.');
    }

    change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    echo 'Password changed.';
}
catch (Exception $e) {
    echo $e->getMessage();
}
display_user_menu();
do_html_footer();
?>
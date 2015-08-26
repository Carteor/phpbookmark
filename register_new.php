<?php
require_once('bookmark_fns.php');

$email = $_POST['email'];
$username = $_POST['username'];
$passwd = $_POST['passwd'];
$passwd2 = $_POST['passwd2'];

session_start();

try
{
    if (!filled_out($_POST))
    {
        throw new Exception('You haven\'t filled form properly.
                            Please, try again.');
    }

    if (!valid_email($email))
    {
        throw new Exception('Incorrect email. Please, try again.');
    }

    if ((strlen($passwd)<6) || (strlen($passwd)>16)) {
        throw new Exception('Password incorrect, it must contain
                        between 6 and 16 characters. Please, try again.');
    }
register($username, $email, $passwd);

$_SESSION['valid_user'] = $username;

do_html_header('Successful registration');
echo 'Your registration is successful. Go to page '
    .' for authorized users '
    .' and start to create bookmarks! ';
do_html_url('member.php',
    'Go to page for authorized users');

do_html_footer();
}
catch (Exception $e) {
    do_html_header('Problem:');
    echo $e->getMessage();
    do_html_footer();
    exit;
}
?>
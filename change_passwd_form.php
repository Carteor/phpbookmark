<?php
require_once('bookmark_fns.php');

do_html_header("Change password");
?>
<form action="change_passwd.php" method="post">
    Old password: <input type="password" name="old_passwd"> <br />
    New password: <input type="password" name="new_passwd"> <br />
    New password confirmation: <input type="password" name="new_passwd2"> <br />
    <input type="submit" value="Change password">
</form>
<?php
display_user_menu();
do_html_footer();
?>

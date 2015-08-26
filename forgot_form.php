<?php
require_once('bookmark_fns.php');

do_html_header("Reset password");
?>
<body>
<form action="forgot_passwd.php" method="post">
    <label for="reset-text">Enter username:</label>
    <input type="text" name="username" id="reset-text">
    <input type="submit" value="Reset password">
</form>
</body>
<?php
do_html_footer();
?>
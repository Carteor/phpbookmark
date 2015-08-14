<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Add bookmark');
echo 'You signed in as '.$_SESSION['valid_user'].'<br />';
?>
<body>
<form method="post" action="add_bms.php">
    <input type="text" name="new_url" value="http://">
    <input type="submit" value="Add bookmark">
</form>
</body>
<?php
do_html_footer();
?>

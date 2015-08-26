<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Add bookmark');
echo 'You signed in as '.$_SESSION['valid_user'].'<br />';
<<<<<<< HEAD
display_add_bm_form();
=======
?>
<body>
<form method="post" action="add_bms.php">
    <input type="text" name="new_url" value="http://">
    <input type="submit" value="Add bookmark">
</form>
</body>
<?php
>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd
do_html_footer();
?>

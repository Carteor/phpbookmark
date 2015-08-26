<?php
require_once('bookmark_fns.php');
session_start();

$new_url = $_POST['new_url'];

<<<<<<< HEAD
if (!filled_out($_POST)) {
    echo "<p class=\"warn\">Form hasn\'t filled properly.</p>";
} else {
=======
do_html_header('Adding bookmarks');

try {
    check_valid_user();
    if (!filled_out($_POST)) {
        throw new Exception('Form wasn\'t filled properly.');
    }

>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd
    if (strstr($new_url, 'http://') == false) {
        $new_url = 'http://'.$new_url;
    }

    if (!(@ fopen($new_url, 'r'))) {
<<<<<<< HEAD
        echo "<p class=\"warn\">Incorrect URL.</p>";
    } else {
        add_bm($new_url);
        echo "<p>Bookmark added.</p>";
    }

=======
        throw new Exception('Invalid URL-address.');
    }

    add_bm($new_url);
    echo 'Bookmark added.';

>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd
    if ($url_array = get_user_urls($_SESSION['valid_user'])) {
        display_user_urls($url_array);
    }
}
<<<<<<< HEAD
=======
catch (Exception $e) {
    echo $e->getMessage();
}

display_user_menu();
do_html_footer();
>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd
?>
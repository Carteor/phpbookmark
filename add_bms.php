<?php
require_once('bookmark_fns.php');
session_start();

$new_url = $_POST['new_url'];

if (!filled_out($_POST)) {
    echo "<p class=\"warn\">Form hasn\'t filled properly.</p>";
} else {
    if (strstr($new_url, 'http://') == false) {
        $new_url = 'http://'.$new_url;
    }

    if (!(@ fopen($new_url, 'r'))) {
        echo "<p class=\"warn\">Incorrect URL.</p>";
    } else {
        add_bm($new_url);
        echo "<p>Bookmark added.</p>";
    }

    if ($url_array = get_user_urls($_SESSION['valid_user'])) {
        display_user_urls($url_array);
    }
}
?>
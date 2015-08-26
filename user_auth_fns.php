<?php
function register($username, $email, $password) {
    $conn = db_connect();

    $result = $conn->query("select * from user
      where username='".$username."'");
    if (!$result) {
        throw new Exception('Can\'t process query to the database');
    }

    if ($result->num_rows > 0) {
        throw new Exception('This username occupied - Choose
            other username on previous page.');
    }

    $result = $conn->query("insert into user values
        ('".$username."', sha1('".$password."'), '".$email."')");

    if (!$result) {
        throw new Exception('Can\'t save to database - please, try again later.');
    }
    return true;
}

function login($username, $password) {
    $conn = db_connect();

    $result = $conn->query("select * from user
        where username='".$username."'
        and passwd = sha1('".$password."')");
    if (!$result) {
        throw new Exception('Can\'t login in system');
    }

    if ($result->num_rows > 0) {
        return true;
    } else {
        throw new Exception('Can\'t login in system');
    }
}

function check_valid_user() {
    if (isset($_SESSION['valid_user'])) {
        echo "You login as ".$_SESSION['valid_user']."<br />";
    } else {
        do_html_heading('Problem: ');
        echo 'You haven\'t signed in.<br />';
        do_html_url('login.php', 'Login');
        do_html_footer();
        exit;
    }
}

function change_password($username, $old_password, $new_password) {
    login($username, $old_password);
    $conn = db_connect();
    $result = $conn->query("update user
            set passwd = sha1('".$new_password."')
            where username = '".$username."'");
    if (!$result) {
        throw new Exception('Password can\'t change.');
    } else {
        return true;
    }
}

function reset_password($username) {
    $new_password = get_random_word(6, 13);

    if ($new_password == false) {
        throw new Exception('Can\'t generate new password.');
    }

    $rand_number = rand(0, 999);
    $new_password .= $rand_number;

    $conn = db_connect();
    $result = $conn->query("update user
        set passwd = sha1('".$new_password."')
        where username = '".$username."'");
    if (!$result) {
        throw new Exception('Can\'t change password.');
    } else {
        return $new_password;
    }
}

function get_random_word($min_length, $max_length) {
    $word = '';

    $dictionary = 'C:\wamp\www\projects\phpbookmark\usr\dict\words\misc\offensive.1';
    $fp = fopen($dictionary, 'r');
    if (!$fp) {
        return false;
    }
    $size = filesize($dictionary);

    srand ((double) microtime() * 1000000);
    $rand_location = rand(0, $size);
    fseek($fp, $rand_location);

    while ((strlen($word) < $min_length) ||
        (strlen($word) > $max_length) ||
        (strstr($word, "'"))) {
        if (feof($fp)) {
            fseek($fp, 0);
        }
        $word = fgets($fp, 80);
        $word = fgets($fp, 80);
    };
    $word = trim($word);

    return $word;
}

function notify_password($username, $password) {
    $conn = db_connect();
    $result = $conn->query("select email from user
            where username='".$username."'");
    if (!$result) {
        throw new Exception('Email hasn\'t found.');
    } else if ($result->num_rows == 0) {
        throw new Exception('Email hasn\'t found');
    } else {
        $row = $result->fetch_object();
        $email = $row->email;
        $from = "From: support@phpbookmark \r\n";
        $mesg = "Your password was changed to ".$password."\r\n"
                ."Please, rememeber it";
        if ( mail($email, 'Information about PHPBookmarks password reset', $mesg, $from)) {
            return true;
        } else {
            throw new Exception('Can\'t send an email.');
        }
    }

}
?>
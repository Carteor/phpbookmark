<?php
function do_html_header($title)
{
    ?>
    <html>
    <head>
        <title><?php echo $title; ?></title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
            }

            li, td {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
            }

            hr {
                color: #3333cc;
                width: 300px;
                text-align: left;
            }

            a {
                color: #000000;
            }
        </style>
<<<<<<< HEAD

        <link rel="stylesheet" type="text/css" href="new_ss.css" />
        <script src="new_ajax.js" type="text/javascript"></script>

    </head>
    <body>
    <img src="bookmark.gif" alt="PHPBookmark Logo" border="0"
         align="left" valign="bottom" height="55" width="57" />
=======
    </head>
    <body>
    <img src="bookmark.gif" alt="PHPBookmark Logo" border="0"
         valign="bottom" height="70"/>
>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd

    <h1>PHPBookmark</h1>
    <hr/>
    <?php
    if ($title) {
        do_html_heading($title);
    }
}

function do_html_heading($title){
    echo '<h1>'.$title.'</h1>';
}

function display_site_info(){
    ?>
    <ul>
        <li>Save your bookmarks online!</li>
        <li>See what bookmarks like other users!</li>
        <li>Share your favourite bookmarks!</li>
    </ul>
    <?php
}

function display_login_form(){
    ?>
    <a href="register_form.php">Sign Up</a>
    <div style="background-color: #cccccc">
        Sign In For Registered Users
        <form method="post" action="member.php">
            <label for="inname">Name:</label>
            <input type="text" id="inname" name="username"> <br />
            <label for="inpass">Password:</label>
            <input type="password" id="inpass" name="passwd"> <br />
            <input type="submit" value="Sign In">
        </form>
        <a href="forgot_form.php">Forgot password?</a>
    </div>
    <?php
}

function do_html_footer(){
    ?>
    </body>
    </html>
    <?php
}

function display_registration_form(){
    ?>
    <div>
        <form method="post" action="register_new.php">
            <label for="regemail">E-mail address:</label>
            <input type="text" name="email" id="regemail"> <br />
            <label for="regname">Username (up to 16 symbols):</label>
            <input type="text" name="username" id="regname"> <br />
            <label for="regpass">Password (more than 6 symbols):</label>
            <input type="password" name="passwd" id="regpass"> <br />
            <label for="passwd2">Password confirmation:</label>
            <input type="password" name="passwd2" id="regpass2"> <br />
            <input type="submit" value="Register">
        </form>
    </div>
    <?php
}

function do_html_url($url, $name){
    echo '<br />'.'<a href="'.$url.'">'.$name.'</a>';
}

function display_user_urls($url_array){
    $color = "red";
    echo "<form action=\"delete_bms.php\" method=\"post\">";
    foreach ($url_array as $url){
        echo "<tr bgcolor=\"".$color."\"><td>
            <a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
            <td><input type=\"checkbox\" name=\"del_me[]\"
            value=\"".$url."\"/></td></tr> <br />";
    }
}

function display_user_menu(){
    ?>
    <a href="member.php">Main</a>
    <a href="add_bm_form.php">Add bookmark</a>
    <input type="submit" value="Delete bookmark">
    <a href="change_passwd_form.php">Change password</a>
    <a href="#">Recommended bookmarks</a>
    <a href="logout.php">Logout</a>
    </form>
    <?php
}

<<<<<<< HEAD
function display_add_bm_form() {
?>
<script type="text/javascript">
    var myReq = getXMLHTTPRequest();
</script>
<form>
    <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td>New bookmark:</td>
            <td><input type="text" name="new_url" value="http://"
                       size="30" maxlength="255" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" value="Add bookmark"
                       onClick="JavaScript:addNewBookmark(); "/>
            </td>
        </tr>
    </table>
</form>
<?php
}

=======
>>>>>>> 3d30b0fec6d6bca548383278f97b66e8f4fb5ddd
?>
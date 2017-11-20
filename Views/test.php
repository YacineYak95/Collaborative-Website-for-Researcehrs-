<?php
$itr=0;
setcookie($itr, $cookie_value, time() + (86400 * 30), "/");
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
} else {
    echo "Value is: " . $_COOKIE['itr'];
}
?>

</body>
</html>
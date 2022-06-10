<?php
require_once __DIR__."/vendor/autoload.php";
require_once  __DIR__."/tmp.php";

use MongoDB\Client;

$db = new \MongoDB\Client("mongodb://127.0.0.1/");
$db = $db->hospital->duty;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maxim</title>
    <script src="script.js"></script>
</head>
<body>
<?php
if (isset($_POST["nurse"])) {
    findWards($db, $_POST["nurse"]);
} elseif (isset($_POST["department"])) {
    findNurses($db, $_POST["department"]);
} elseif (isset($_POST["shift"])) {
    findShift($db, $_POST["shift"], $_POST["department2"]);
}
?>
<hr>
<div id="upload"></div>
<hr>
<form action="" method="post">
    <select name="nurse">
        <?php
        showNurses($db);
        ?>
    </select>
    <input type="submit" value="Enter"><br>
</form>
<br>
<form action="" method="post">
    <select name="department">
        <?php
        showDepartments($db);
        ?>
    </select>
    <input type="submit" value="Enter"><br>
</form>
<br>
<form action="" method="post">
    <select name="shift">
        <option value="First">First</option>
        <option value="Second">Second</option>
        <option value="Third">Third</option>
    </select>
    <select name="department2">
        <?php
        showDepartments($db);
        ?>
    </select>
    <input type="submit" value="Enter"><br>
    <input type="button" value="Download" onclick="download()">
    <input type="button" value="Upload" onclick="upload()">
</form>
</body>
</html>

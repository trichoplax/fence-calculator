<?php
define('POST_WIDTH', 0.1);
define('RAILING_LENGTH', 1.5);
require_once('php/functions.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fence Calculator</title>
</head>
<body>

<H1>Fence Calculator</H1>

<hr>

<form action="index.php" method="post">
    <label for="length">
        Required fence length: <input type="number" step="0.01" name="length" required><br>
    </label>
    <input type="submit" name="length-submit">
</form>

<?php
if (isset($_POST['length-submit'])) {
    echo messageFromLength($_POST['length'],
        POST_WIDTH,
        RAILING_LENGTH);
} else {
    echo 'Specify a length, then press "Submit".';
}?>

<hr>

<form action="index.php" method="post">
    Available materials:<br>
    <label for="posts">
        Posts: <input type="number" name="posts" required><br>
    </label>
    <label for="railings">
        Railings: <input type="number" name="railings" required><br>
    </label>
    <input type="submit" name="materials-submit">
</form>

<?php
if (isset($_POST['materials-submit'])) {
    echo messageFromMaterials($_POST['posts'],
        $_POST['railings'],
        POST_WIDTH,
        RAILING_LENGTH);
} else {
    echo 'Specify how many available posts and railings, then press "Submit".';
}
?>

<hr>

<footer>
    Post width: <?php echo POST_WIDTH; ?>m.
    Railing length: <?php echo RAILING_LENGTH; ?>m.
</footer>

</body>
</html>

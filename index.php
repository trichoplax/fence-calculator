<?php
require_once('php/functions.php')
?>
<!DOCTYPE html>
<html>
<body>

<H1>Fence Calculator</H1>

<form action="index.php" method="post">
    Required fence length: <input type="number" name="length" required>
    <input type="submit" name="submit">
</form><br>

<?php echo messageToUser() ?>

<footer>
    <p>Post width: <?php echo POST_WIDTH; ?>m.</p>
    <p> Railing length: <?php echo RAILING_LENGTH; ?>m.</p>
</footer>

</body>
</html>

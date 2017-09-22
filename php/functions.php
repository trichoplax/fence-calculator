<?php
define('POST_WIDTH', 0.1);
define('RAILING_LENGTH', 1.5);

/**
 * Calculate the posts and railings required.
 *
 * @param $length The required length of fence.
 *
 * @return string A description of the required posts and railings.
 */
function requirements($length)
{
    $railings = ceil(($length - POST_WIDTH) / (RAILING_LENGTH + POST_WIDTH));
    $posts = $railings + 1;
    $total = $railings * RAILING_LENGTH + $posts * POST_WIDTH;
    $overshoot = $total - $length;
    $returnText = "";
    $returnText .= "For a fence of length " . $length . " metres, ";
    $returnText .= "you will require " . $posts . " posts and " . $railings . " railings.<br>";
    $returnText .= 'This will give a fence of length ' . $total . ' metres';
    if ($overshoot > 0)
    {
        $returnText .= ', ' . $overshoot . ' metres longer than required.';
    } else {
        $returnText .= '.';
    }
    return $returnText;
}

/**
 * Decide which text to display to the user.
 *
 * @return string Either requirements or instructions if no input yet.
 */
function messageToUser()
{
    if (isset($_POST['submit'])) {
        $summary = requirements($_POST['length']);
    } else {
        $summary = 'Specify a length and then press "Submit".';
    }
    return $summary;
}

<?php

/**
 * Display a message based on the posts and railings specified.
 *
 * @param int $posts The number of posts available.
 * @param int $railings The number of railings available.
 * @param float $postWidth The width of a post.
 * @param float $railingLength The length of a railing.
 *
 * @return string Description of length or else instructions.
 */
function messageFromMaterials(int $posts,
                              int $railings,
                              float $postWidth,
                              float $railingLength)
{
    if ($railings < 1) {
        $returnText = 'You cannot build a fence with less than 1 railing.';
    } elseif ($posts < 2) {
        $returnText = 'You cannot build a fence with less than 2 posts.';
    } else {
        $usableRailings = min($railings, $posts - 1);
        $usablePosts = $usableRailings + 1;
        $length = round($usableRailings * ($railingLength + $postWidth) + $postWidth, 2);
        $surplusRailings = $railings - $usableRailings;
        $surplusPosts = $posts - $usablePosts;
        $returnText = 'Given ' . $posts . ' posts and ' . $railings;
        $returnText .= ' railings:<br>You can use ' . $usablePosts;
        $returnText .= ' posts and ' . $usableRailings;
        $returnText .= ' railings to build a fence of length ';
        $returnText .= $length . ' metres';

        if ($surplusPosts > 0) {
            $returnText .= ', with ' . $surplusPosts . ' posts left over.';
        } elseif ($surplusRailings > 0) {
            $returnText .= ', with ' . $surplusRailings . ' railings left over.';
        } else {
            $returnText .= '.';
        }
    }
    return $returnText;
}

/**
 * Display a message based on the length specified.
 *
 * @param float $length The length of fence required.
 * @param float $postWidth The width of a post.
 * @param float $railingLength The length of a railing.
 *
 * @return string Description of materials or else instructions.
 */
function messageFromLength(float $length,
                           float $postWidth,
                           float $railingLength)
{
    if ($length == 0) {
        $returnText = 'For a length of zero you do not require a fence.';
    } elseif ($length < 0) {
        $returnText = 'You cannot have a negative length fence. ';
        $returnText .= 'We are out of negative length railings.';
    } else {
        $railings = ceil(($length - $postWidth) / ($postWidth + $railingLength));
        $posts = $railings + 1;
        $total = round($posts * $postWidth + $railings * $railingLength, 2);
        $overshoot = round($total - $length, 2);
        $returnText = 'For a fence of length ' . $length . ' metres, ';
        $returnText .= 'you will require ' . $posts . ' posts and ';
        $returnText .= $railings . ' railings.<br>';
        $returnText .= 'This will give a fence of length ' . $total . ' metres';
        if ($overshoot > 0) {
            $returnText .= ', ' . $overshoot . ' metres longer than required.';
        } else {
            $returnText .= '.';
        }
    }
    return $returnText;
}
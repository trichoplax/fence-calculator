<?php
/**
 * Calculate posts and railings required.
 *
 * @param float $length Length of required fence.
 * @param float $postWidth Width of a post.
 * @param float $railingLength Length of a railing.
 *
 * @return string Description of the posts and railings required.
 */
function materialsGivenLength(float $length,
                              float $postWidth,
                              float $railingLength)
{
    $railings = ceil(($length - $postWidth) / ($postWidth + $railingLength));
    $posts = $railings + 1;
    $total =  $posts * $postWidth + $railings * $railingLength;
    $overshoot = $total - $length;
    $returnText = "";
    $returnText .= "For a fence of length " . $length . " metres, ";
    $returnText .= "you will require " . $posts . " posts and ";
    $returnText .= $railings . " railings.<br>";
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
 * Calculate possible length of fence.
 *
 * @param int $posts The number of posts available.
 * @param int $railings The number of railings available.
 * @param float $postWidth The width of a post.
 * @param float $railingLength The length of a railing.
 *
 * @return string Description of the length of fence possible.
 */
function lengthGivenMaterials(int $posts, int $railings, float $postWidth, float $railingLength)
{
    $usableRailings = min($railings, $posts - 1);
    $usablePosts = $usableRailings + 1;
    $length = $usableRailings * ($railingLength + $postWidth) + $postWidth;
    $surplusRailings = $railings - $usableRailings;
    $surplusPosts = $posts - $usablePosts;
    $returnText = '';
    $returnText .= 'Using ' . $usablePosts . ' posts and ' . $usableRailings;
    $returnText .= ' railings you can build a fence of length ' . $length;

    if ($surplusPosts > 0) {
        $returnText .= ', leaving ' . $surplusPosts . ' posts left over.';
    } elseif ($surplusRailings > 0) {
        $returnText .= ', leaving ' . $surplusRailings . ' railings left over.';
    } else {
        $returnText .= '.';
    }
    return $returnText;
}

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
function messageFromMaterials(int $posts, int $railings, float $postWidth, float $railingLength)
{
    $summary = lengthGivenMaterials($posts, $railings, $postWidth, $railingLength);
    return $summary;
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
function messageFromLength(float $length, float $postWidth, float $railingLength)
{
        $summary = materialsGivenLength($length, $postWidth, $railingLength);
    return $summary;
}

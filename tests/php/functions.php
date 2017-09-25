<?php

use PHPUnit\Framework\TestCase;
require_once('../../php/functions.php');

class StackTest extends TestCase {
    public function testmessageFromMaterialsSuccessMaxTwoDecimalPlaces() {
        $case = messageFromMaterials(999, 998, 0.1, 1.5);
        $expected = 'Given 999 posts and 998 railings:<br>You can use 999';
        $expected .= ' posts and 998 railings to build a fence of length ';
        $expected .= '1596.9 metres';
        $this->assertEquals($case, $expected);
    }

    public function testmessageFromMaterialsFailureNegativePosts() {}
    public function testmessageFromMaterialsFailureNegativeRailings() {}
    public function testmessageFromMaterialsFailureZeroPosts() {}
    public function testmessageFromMaterialsFailureZeroRailings() {}
    public function testmessageFromMaterialsFailureOnlyOnePost() {}
    public function testmessageFromMaterialsMalformedPostsAsArray() {}
    public function testmessageFromMaterialsMalformedRailingsAsArray() {}
    public function testmessageFromMaterialsMalformedPostsAsNonIntegerFloat() {}
    public function testmessageFromMaterialsMalformedRailingsAsNonIntegerFloat() {}

    public function testmessageFromLengthSuccessShortLength() {
        $case = messageFromLength(0.01, 0.1, 1.5);
        $expected = 'For a fence of length 0.01 metres, you will require 2 posts and ';
        $expected .= '1 railings.<br>This will give a fence of length 1.7 metres';
        $expected .= ', 1.69 metres longer than required.';
        $this->assertEquals($case, $expected);
    }

    public function testmessageFromLengthFailureNegativeLength() {}
    public function testmessageFromLengthFailureZeroLength() {}
    public function testmessageFromLengthMalformedAsArray() {}
}
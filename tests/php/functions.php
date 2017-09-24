<?php

use PHPUnit\Framework\TestCase;
require_once('../../php/functions.php');

class StackTest extends TestCase {
    public function testmessageFromMaterialsSuccessMaxTwoDecimalPlaces() {}
    public function testmessageFromMaterialsFailureNegativePosts() {}
    public function testmessageFromMaterialsFailureNegativeRailings() {}
    public function testmessageFromMaterialsFailureZeroPosts() {}
    public function testmessageFromMaterialsFailureZeroRailings() {}
    public function testmessageFromMaterialsFailureOnlyOnePost() {}
    public function testmessageFromMaterialsMalformedPostsAsArray() {}
    public function testmessageFromMaterialsMalformedRailingsAsArray() {}
    public function testmessageFromMaterialsMalformedPostsAsNonIntegerFloat() {}
    public function testmessageFromMaterialsMalformedRailingsAsNonIntegerFloat() {}

    public function testmessageFromLengthSuccessShortLength() {}
    public function testmessageFromLengthFailureNegativeLength() {}
    public function testmessageFromLengthFailureZeroLength() {}
    public function testmessageFromLengthMalformedAsArray() {}
}
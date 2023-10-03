<?php

namespace Tests\Unit\Assets;

use TestAttribute;

#[TestAttribute]
class TestObject {
    #[TestAttribute]
    public $testProperty;

    #[TestAttribute]
    public function testMethod(#[TestAttribute] $testParameter) {
        //
    }

    #[TestAttribute]
    public const TEST_CONSTANT = 'test';
}
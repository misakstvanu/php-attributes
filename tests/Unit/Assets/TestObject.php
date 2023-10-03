<?php

namespace Tests\Unit\Assets;

use Tests\Unit\Attributes\TestAttribute;

#[TestAttribute]
class TestObject {
    #[TestAttribute]
    public mixed $testProperty;

    #[TestAttribute]
    public function testMethod(#[TestAttribute] $testParameter) {
        //
    }

    #[TestAttribute]
    public const TEST_CONSTANT = 'test';
}
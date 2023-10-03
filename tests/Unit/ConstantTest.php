<?php

namespace Tests\Unit;

use Misakstvanu\Attributes\Attributes;
use PHPUnit\Framework\TestCase;
use Tests\Assets\TestObject;

class ConstantTest extends TestCase {

    public function reflection_test()
    {
        $attributes = constant_attributes(TestObject::class, 'TEST_CONSTANT');
        $this->assertTrue(true);
    }

    public function name_test() {

    }
    
}
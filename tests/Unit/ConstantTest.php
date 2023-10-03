<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionAttribute;
use Tests\Unit\Assets\TestObject;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\constant_attributes;
use function Misakstvanu\Attributes\constant_attributes_names;

class ConstantTest extends TestCase {

    public function test_reflection(): void
    {
        $attributes = constant_attributes(TestObject::class, 'TEST_CONSTANT');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertInstanceOf(ReflectionAttribute::class, $attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]->getName());
    }

    public function test_name(): void
    {
        $attributes = constant_attributes_names(TestObject::class, 'TEST_CONSTANT');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }
    
}
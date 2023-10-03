<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\TestObject;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\constant_attributes;
use function Misakstvanu\Attributes\constant_attributes_names;
use function Misakstvanu\Attributes\parameter_attributes;
use function Misakstvanu\Attributes\parameter_attributes_names;

class ParameterTest extends TestCase {


    public function test_reflection(): void
    {
        $attributes = parameter_attributes(fn(#[TestAttribute] $value) => $value, 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertInstanceOf(\ReflectionAttribute::class, $attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]->getName());
    }

    public function test_name(): void
    {
        $attributes = parameter_attributes_names(fn(#[TestAttribute] $value) => $value, 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }


}
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\parameter_attributes;
use function Misakstvanu\Attributes\parameter_attributes_names;

class ParameterTest extends TestCase {


    /**
     * @throws \ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = parameter_attributes(fn(#[TestAttribute] $value) => $value, 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertInstanceOf(\ReflectionAttribute::class, $attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]->getName());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_name(): void
    {
        $attributes = parameter_attributes_names(fn(#[TestAttribute] $value) => $value, 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }


}
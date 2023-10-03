<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionAttribute;
use ReflectionException;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\parameter_attributes;
use function Misakstvanu\Attributes\parameter_attributes_names;

class ParameterTest extends TestCase {

    protected function test_function(#[TestAttribute] mixed $value) {
        return $value;
    }

    /**
     * @throws ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = parameter_attributes([self::class, 'test_function'], 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertInstanceOf(ReflectionAttribute::class, $attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]->getName());
    }

    /**
     * @throws ReflectionException
     */
    public function test_name(): void
    {
        $attributes = parameter_attributes_names([self::class, 'test_function'], 'value');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }

}
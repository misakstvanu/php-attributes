<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionAttribute;
use ReflectionException;
use Tests\Unit\Assets\TestObject;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\method_attributes;
use function Misakstvanu\Attributes\method_attributes_names;

class MethodTest extends TestCase {

    /**
     * @throws ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = method_attributes(TestObject::class, 'testMethod');
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
        $attributes = method_attributes_names(TestObject::class, 'testMethod');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }

}
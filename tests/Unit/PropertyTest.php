<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\TestObject;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\property_attributes;
use function Misakstvanu\Attributes\property_attributes_names;

class PropertyTest extends TestCase {


    /**
     * @throws \ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = property_attributes(TestObject::class, 'testProperty');
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
        $attributes = property_attributes_names(TestObject::class, 'testProperty');
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }


}
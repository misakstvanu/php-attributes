<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Assets\TestObject;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\object_attributes;
use function Misakstvanu\Attributes\object_attributes_names;

class ObjectTest extends TestCase {


    /**
     * @throws \ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = object_attributes(TestObject::class);
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
        $attributes = object_attributes_names(TestObject::class);
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }

}

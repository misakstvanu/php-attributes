<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionAttribute;
use ReflectionException;
use Tests\Unit\Attributes\TestAttribute;
use function Misakstvanu\Attributes\function_attributes;
use function Misakstvanu\Attributes\function_attributes_names;

class FunctionTest extends TestCase {

    /**
     * @throws ReflectionException
     */
    public function test_reflection(): void
    {
        $attributes = function_attributes( #[TestAttribute] function () {
            return 1;
        });
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
        $attributes = function_attributes_names( #[TestAttribute] function () {
            return 1;
        });
        $this->assertIsArray($attributes);
        $this->assertEquals(1, sizeof($attributes));
        $this->assertIsString($attributes[0]);
        $this->assertEquals(TestAttribute::class, $attributes[0]);
    }

}

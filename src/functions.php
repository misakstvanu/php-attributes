<?php

namespace Misakstvanu\Attributes;

////////////////////////////////////////////////////////////////////////
//////////////////// REFLECTION ATTRIBUTE GETTERS //////////////////////
////////////////////////////////////////////////////////////////////////


use Closure;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use ReflectionProperty;

if(!function_exists('object_attributes')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    function object_attributes(object|string $classOrObject): array {
        $reflection = new ReflectionClass($classOrObject);
        return $reflection->getAttributes();
    }
}

if(!function_exists('method_attributes')) {
    /**
     * @param object|string $classOrObject Classname or object (instance of the class) that contains the method.
     * @param string $method The name of the method.
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    function method_attributes(object|string $classOrObject, string $method): array {
        $reflection = new ReflectionMethod($classOrObject, $method);
        return $reflection->getAttributes();
    }
}

if(!function_exists('property_attributes')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @param string $property Name of the property.
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    function property_attributes(object|string $classOrObject, string $property): array {
        $reflection = new ReflectionProperty($classOrObject, $property);
        return $reflection->getAttributes();
    }
}

if(!function_exists('constant_attributes')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @param string $constant The name of the class constant.
     * @return array<ReflectionAttribute>
     */
    function constant_attributes(object|string $classOrObject, string $constant): array {
        $reflection = new ReflectionClassConstant($classOrObject, $constant);
        return $reflection->getAttributes();
    }
}

if(!function_exists('parameter_attributes')) {
    /**
     * @param string|array|object $function The function to reflect parameters from.
     * @param int|string $parameter Either an int specifying the position of the parameter (starting with zero), or the parameter name as string.
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    function parameter_attributes(string|array|object $function, int|string $parameter): array {
        $reflection = new ReflectionFunction($function);
        return $reflection->getAttributes();
    }
}

if(!function_exists('function_attributes')) {
    /**
     * @param Closure|string $function The name of the function to reflect or a closure.
     * @return array<ReflectionAttribute>
     * @throws ReflectionException
     */
    function function_attributes(Closure|string $function): array {
        $reflection = new ReflectionFunction($function);
        return $reflection->getAttributes();
    }
}

////////////////////////////////////////////////////////////////////////
/////////////////////// ATTRIBUTE CLASS GETTERS ////////////////////////
////////////////////////////////////////////////////////////////////////

if(!function_exists('object_attributes_names')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @return array<string>
     * @throws ReflectionException
     */
    function object_attributes_names(object|string $classOrObject): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), object_attributes($classOrObject));
    }
}

if(!function_exists('method_attributes_names')) {
    /**
     * @param object|string $classOrObject Classname or object (instance of the class) that contains the method.
     * @param string $method The name of the method.
     * @return array<string>
     * @throws ReflectionException
     */
    function method_attributes_names(object|string $classOrObject, string $method): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), method_attributes($classOrObject, $method));
    }
}
if(!function_exists('property_attributes_names')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @param string $property Name of the property.
     * @return array<string>
     * @throws ReflectionException
     */
    function property_attributes_names(object|string $classOrObject, string $property): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), property_attributes($classOrObject, $property));
    }
}
if(!function_exists('constant_attributes_names')) {
    /**
     * @param object|string $classOrObject Either a string containing the name of the class to reflect, or an object.
     * @param string $constant The name of the class constant.
     * @return array<string>
     */
    function constant_attributes_names(object|string $classOrObject, string $constant): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), constant_attributes($classOrObject, $constant));
    }
}
if(!function_exists('parameter_attributes_names')) {
    /**
     * @param string|array|object $function The function to reflect parameters from.
     * @param int|string $parameter Either an int specifying the position of the parameter (starting with zero), or the parameter name as string.
     * @return array<string>
     * @throws ReflectionException
     */
    function parameter_attributes_names(string|array|object $function, int|string $parameter): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), parameter_attributes($function, $parameter));
    }
}
if(!function_exists('function_attributes_names')) {
    /**
     * @param Closure|string $function The name of the function to reflect or a closure.
     * @return array<string>
     * @throws ReflectionException
     */
    function function_attributes_names(Closure|string $function): array {
        return array_map(fn(ReflectionAttribute $attribute) => $attribute->getName(), function_attributes($function));
    }
}
                    
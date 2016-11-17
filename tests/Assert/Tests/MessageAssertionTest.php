<?php
namespace Assert\Tests;

use Assert\Assert;
use Assert\Assertion;

final class MessageAssertionTest extends \PHPUnit_Framework_TestCase
{
    const EXCEPTION = 'Assert\InvalidArgumentException';

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideEqualAssertions
     */
    public function testEqual($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::eq(1, 2, $suppliedMessage, $propertyPath);
    }

    public static function provideEqualAssertions()
    {
        return array(
            array('Value "1" does not equal expected value "2".', null, null),
            array('propertyPath with value "1" does not equal expected value "2".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideSameAssertions
     */
    public function testSame($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::same(1, 2, $suppliedMessage, $propertyPath);
    }

    public static function provideSameAssertions()
    {
        return array(
            array('Value "1" is not the same as expected value "2".', null, null),
            array('propertyPath with value "1" is not the same as expected value "2".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotEqualAssertions
     */
    public function testNotEqual($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notEq(2, 2, $suppliedMessage, $propertyPath);
    }

    public static function provideNotEqualAssertions()
    {
        return array(
            array('Value "2" is equal to expected value "2".', null, null),
            array('propertyPath with value "2" is equal to expected value "2".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotSameAssertions
     */
    public function testNotSame($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notSame(2, 2, $suppliedMessage, $propertyPath);
    }

    public static function provideNotSameAssertions()
    {
        return array(
            array('Value "2" is the same as expected value "2".', null, null),
            array('propertyPath with value "2" is the same as expected value "2".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotInArrayAssertions
     */
    public function testNotInArray($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notInArray(2, array(2), $suppliedMessage, $propertyPath);
    }

    public static function provideNotInArrayAssertions()
    {
        return array(
            array('Value "2" is in given "<ARRAY>".', null, null),
            array('propertyPath with value "2" is in given "<ARRAY>".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIntegerAssertions
     */
    public function testInteger($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::integer('1', $suppliedMessage, $propertyPath);
    }

    public static function provideIntegerAssertions()
    {
        return array(
            array('Value "1" is not an integer.', null, null),
            array('propertyPath with value "1" is not an integer.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideFloatAssertions
     */
    public function testFloat($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::float('1', $suppliedMessage, $propertyPath);
    }

    public static function provideFloatAssertions()
    {
        return array(
            array('Value "1" is not a float.', null, null),
            array('propertyPath with value "1" is not a float.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideDigitAssertions
     */
    public function testDigit($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::digit('d', $suppliedMessage, $propertyPath);
    }

    public static function provideDigitAssertions()
    {
        return array(
            array('Value "d" is not a digit.', null, null),
            array('propertyPath with value "d" is not a digit.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIntegerishAssertions
     */
    public function testIntegerish($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::integerish('d', $suppliedMessage, $propertyPath);
    }

    public static function provideIntegerishAssertions()
    {
        return array(
            array('Value "d" is not an integer or a number castable to integer.', null, null),
            array('propertyPath with value "d" is not an integer or a number castable to integer.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideBooleanAssertions
     */
    public function testBoolean($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::boolean('d', $suppliedMessage, $propertyPath);
    }

    public static function provideBooleanAssertions()
    {
        return array(
            array('Value "d" is not a boolean.', null, null),
            array('propertyPath with value "d" is not a boolean.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideScalarAssertions
     */
    public function testScalar($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::scalar(new \stdClass(), $suppliedMessage, $propertyPath);
    }

    public static function provideScalarAssertions()
    {
        return array(
            array('Value "stdClass" is not a scalar.', null, null),
            array('propertyPath with value "stdClass" is not a scalar.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotEmptyAssertions
     */
    public function testNotEmpty($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notEmpty('', $suppliedMessage, $propertyPath);
    }

    public static function provideNotEmptyAssertions()
    {
        return array(
            array('Value "" is empty, but non empty value was expected.', null, null),
            array('propertyPath with value "" is empty, but non empty value was expected.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNoContentAssertions
     */
    public function testNoContent($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::noContent('val', $suppliedMessage, $propertyPath);
    }

    public static function provideNoContentAssertions()
    {
        return array(
            array('Value "val" is not empty, but empty value was expected.', null, null),
            array('propertyPath with value "val" is not empty, but empty value was expected.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNullAssertions
     */
    public function testNull($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::null('val', $suppliedMessage, $propertyPath);
    }

    public static function provideNullAssertions()
    {
        return array(
            array('Value "val" is not null, but null value was expected.', null, null),
            array('propertyPath with value "val" is not null, but null value was expected.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotNullAssertions
     */
    public function testNotNull($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notNull(null, $suppliedMessage, $propertyPath);
    }

    public static function provideNotNullAssertions()
    {
        return array(
            array('Value "<NULL>" is null, but non null value was expected.', null, null),
            array('propertyPath with value "<NULL>" is null, but non null value was expected.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideStringAssertions
     */
    public function testString($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::string(2, $suppliedMessage, $propertyPath);
    }

    public static function provideStringAssertions()
    {
        return array(
            array('Value "2" expected to be string, type integer given.', null, null),
            array('propertyPath with value "2" expected to be string, type integer given.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideRegexAssertions
     */
    public function testRegex($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::regex("foo", "(bar)", $suppliedMessage, $propertyPath);
    }

    public static function provideRegexAssertions()
    {
        return array(
            array('Value "foo" does not match expression.', null, null),
            array('propertyPath with value "foo" does not match expression.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideLengthAssertions
     */
    public function testLength($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::length("foo", 2, $suppliedMessage, $propertyPath);
    }

    public static function provideLengthAssertions()
    {
        return array(
            array('Value "foo" has to be 2 exactly characters long, but length is 3.', null, null),
            array('propertyPath with value "foo" has to be 2 exactly characters long, but length is 3.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideMinLengthAssertions
     */
    public function testMinLength($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::minLength("foo", 5, $suppliedMessage, $propertyPath);
    }

    public static function provideMinLengthAssertions()
    {
        return array(
            array('Value "foo" is too short, it should have more than 5 characters, but only has 3 characters.', null, null),
            array('propertyPath with value "foo" is too short, it should have more than 5 characters, but only has 3 characters.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideMaxLengthAssertions
     */
    public function testMaxLength($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::maxLength("foo", 1, $suppliedMessage, $propertyPath);
    }

    public static function provideMaxLengthAssertions()
    {
        return array(
            array('Value "foo" is too long, it should have no more than 1 characters, but has 3 characters.', null, null),
            array('propertyPath with value "foo" is too long, it should have no more than 1 characters, but has 3 characters.', null, 'propertyPath'),
        );
    }

    /**
     * @param int $min
     * @param int $max
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideBetweenLengthAssertions
     */
    public function testBetweenLength($min, $max, $expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::betweenLength("foo", $min, $max, $suppliedMessage, $propertyPath);
    }

    public static function provideBetweenLengthAssertions()
    {
        return array(
            array(4, 5, 'Value "foo" is too short, it should have at least 4 characters, but only has 3 characters.', null, null),
            array(4, 5, 'propertyPath with value "foo" is too short, it should have at least 4 characters, but only has 3 characters.', null, 'propertyPath'),
            array(4, 5, 'Some message', 'Some message', null),
            array(4, 5, 'Some message', 'Some message', 'propertyPath'),
            array(1, 2, 'Value "foo" is too long, it should have no more than 2 characters, but has 3 characters.', null, null),
            array(1, 2, 'propertyPath with value "foo" is too long, it should have no more than 2 characters, but has 3 characters.', null, 'propertyPath'),
            array(1, 2, 'Some message', 'Some message', null),
            array(1, 2, 'Some message', 'Some message', 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideStartsWithAssertions
     */
    public function testStartsWith($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::startsWith("foo", 'bar', $suppliedMessage, $propertyPath);
    }

    public static function provideStartsWithAssertions()
    {
        return array(
            array('Value "foo" does not start with "bar".', null, null),
            array('propertyPath with value "foo" does not start with "bar".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideEndsWithAssertions
     */
    public function testEndsWith($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::endsWith("foo", 'bar', $suppliedMessage, $propertyPath);
    }

    public static function provideEndsWithAssertions()
    {
        return array(
            array('Value "foo" does not end with "bar".', null, null),
            array('propertyPath with value "foo" does not end with "bar".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideContainsAssertions
     */
    public function testContains($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::contains("foo", 'bar', $suppliedMessage, $propertyPath);
    }

    public static function provideContainsAssertions()
    {
        return array(
            array('Value "foo" does not contain "bar".', null, null),
            array('propertyPath with value "foo" does not contain "bar".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideChoiceAssertions
     */
    public function testChoice($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::choice("foo", array(), $suppliedMessage, $propertyPath);
    }

    public static function provideChoiceAssertions()
    {
        return array(
            array('Value "foo" is not an element of the valid values: .', null, null),
            array('propertyPath with value "foo" is not an element of the valid values: .', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideInArrayAssertions
     */
    public function testInArray($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::inArray("foo", array(), $suppliedMessage, $propertyPath);
    }

    public static function provideInArrayAssertions()
    {
        return array(
            array('Value "foo" is not an element of the valid values: .', null, null),
            array('propertyPath with value "foo" is not an element of the valid values: .', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNumericAssertions
     */
    public function testNumeric($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::numeric("foo", $suppliedMessage, $propertyPath);
    }

    public static function provideNumericAssertions()
    {
        return array(
            array('Value "foo" is not numeric.', null, null),
            array('propertyPath with value "foo" is not numeric.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIsArrayAssertions
     */
    public function testIsArray($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::isArray("foo", $suppliedMessage, $propertyPath);
    }

    public static function provideIsArrayAssertions()
    {
        return array(
            array('Value "foo" is not an array.', null, null),
            array('propertyPath with value "foo" is not an array.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIsTraversableAssertions
     */
    public function testIsTraversable($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::isTraversable("foo", $suppliedMessage, $propertyPath);
    }

    public static function provideIsTraversableAssertions()
    {
        return array(
            array('Value "foo" is not an array and does not implement Traversable.', null, null),
            array('propertyPath with value "foo" is not an array and does not implement Traversable.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIsArrayAccessibleAssertions
     */
    public function testIsArrayAccessible($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::isArrayAccessible("foo", $suppliedMessage, $propertyPath);
    }

    public static function provideIsArrayAccessibleAssertions()
    {
        return array(
            array('Value "foo" is not an array and does not implement ArrayAccess.', null, null),
            array('propertyPath with value "foo" is not an array and does not implement ArrayAccess.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideKeyExistsAssertions
     */
    public function testKeyExists($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::keyExists(array(), 1, $suppliedMessage, $propertyPath);
    }

    public static function provideKeyExistsAssertions()
    {
        return array(
            array('Array does not contain an element with key "1".', null, null),
            array('Array does not contain an element with key "1".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideKeyNotExistsAssertions
     */
    public function testKeyNotExists($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::keyNotExists(array(1 => 1), 1, $suppliedMessage, $propertyPath);
    }

    public static function provideKeyNotExistsAssertions()
    {
        return array(
            array('Array contains an element with key "1".', null, null),
            array('Array contains an element with key "1".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideKeyIssetAssertions
     */
    public function testKeyIsset($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::keyIsset(array(), 1, $suppliedMessage, $propertyPath);
    }

    public static function provideKeyIssetAssertions()
    {
        return array(
            array('The element with key "1" was not found.', null, null),
            array('The element with key "1" was not found.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotBlankAssertions
     */
    public function testNotBlank($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notBlank('', $suppliedMessage, $propertyPath);
    }

    public static function provideNotBlankAssertions()
    {
        return array(
            array('Value "" is blank, but was expected to contain a value.', null, null),
            array('propertyPath with value "" is blank, but was expected to contain a value.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideIsInstanceOfAssertions
     */
    public function testIsInstanceOf($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::isInstanceOf('', 'stdClass', $suppliedMessage, $propertyPath);
    }

    public static function provideIsInstanceOfAssertions()
    {
        return array(
            array('Class "" was expected to be instanceof of "stdClass" but is not.', null, null),
            array('propertyPath with class "" was expected to be instanceof of "stdClass" but is not.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideNotIsInstanceOfAssertions
     */
    public function testNotIsInstanceOf($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::notIsInstanceOf(new \stdClass(), 'stdClass', $suppliedMessage, $propertyPath);
    }

    public static function provideNotIsInstanceOfAssertions()
    {
        return array(
            array('Class "stdClass" was not expected to be instanceof of "stdClass".', null, null),
            array('propertyPath with class "stdClass" was not expected to be instanceof of "stdClass".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideSubclassOfAssertions
     */
    public function testSubclassOf($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::subclassOf(new \stdClass(), '\DateTime', $suppliedMessage, $propertyPath);
    }

    public static function provideSubclassOfAssertions()
    {
        return array(
            array('Class "stdClass" was expected to be subclass of "\DateTime".', null, null),
            array('propertyPath with class "stdClass" was expected to be subclass of "\DateTime".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideRangeAssertions
     */
    public function testRange($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::range(5, 1, 2, $suppliedMessage, $propertyPath);
    }

    public static function provideRangeAssertions()
    {
        return array(
            array('Number "5" was expected to be at least "1" and at most "2".', null, null),
            array('propertyPath with number "5" was expected to be at least "1" and at most "2".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideMinAssertions
     */
    public function testMin($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::min(1, 5, $suppliedMessage, $propertyPath);
    }

    public static function provideMinAssertions()
    {
        return array(
            array('Number "1" was expected to be at least "5".', null, null),
            array('propertyPath with number "1" was expected to be at least "5".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideMaxAssertions
     */
    public function testMax($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::max(5, 1, $suppliedMessage, $propertyPath);
    }

    public static function provideMaxAssertions()
    {
        return array(
            array('Number "5" was expected to be at most "1".', null, null),
            array('propertyPath with number "5" was expected to be at most "1".', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideFileAssertions
     */
    public function testFile($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::file('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideFileAssertions()
    {
        return array(
            array('File "foo" was expected to exist.', null, null),
            array('propertyPath with file "foo" was expected to exist.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideDirectoryAssertions
     */
    public function testDirectory($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::directory('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideDirectoryAssertions()
    {
        return array(
            array('Path "foo" was expected to be a directory.', null, null),
            array('propertyPath with Path "foo" was expected to be a directory.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideReadableAssertions
     */
    public function testReadable($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::readable('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideReadableAssertions()
    {
        return array(
            array('Path "foo" was expected to be readable.', null, null),
            array('propertyPath with Path "foo" was expected to be readable.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideWriteableAssertions
     */
    public function testWriteable($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::writeable('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideWriteableAssertions()
    {
        return array(
            array('Path "foo" was expected to be writeable.', null, null),
            array('propertyPath with Path "foo" was expected to be writeable.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideEmailAssertions
     */
    public function testEmail($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::email('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideEmailAssertions()
    {
        return array(
            array('Value "foo" was expected to be a valid e-mail address.', null, null),
            array('propertyPath with value "foo" was expected to be a valid e-mail address.', null, 'propertyPath'),
        );
    }

    /**
     * @param string $expectedMessage
     * @param string $suppliedMessage
     * @param string $propertyPath
     *
     * @dataProvider provideUrlAssertions
     */
    public function testUrl($expectedMessage, $suppliedMessage, $propertyPath)
    {
        $this->expectException(self::EXCEPTION);
        $this->expectExceptionMessage($expectedMessage);
        Assertion::url('foo', $suppliedMessage, $propertyPath);
    }

    public static function provideUrlAssertions()
    {
        return array(
            array('Value "foo" was expected to be a valid URL starting with http or https.', null, null),
            array('propertyPath with value "foo" was expected to be a valid URL starting with http or https.', null, 'propertyPath'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Intervention\Validation\Tests\Rules;

use Intervention\Validation\Rules\Uppercase;
use PHPUnit\Framework\TestCase;

class UppercaseTest extends TestCase
{
    /**
     * @dataProvider dataProvider
    */
    public function testValidation($result, $value)
    {
        $valid = (new Uppercase())->isValid($value);
        $this->assertEquals($result, $valid);
    }

    public function dataProvider()
    {
        return [
            [true, 'A'],
            [true, 'ABC'],
            [true, 'Ä'],
            [true, 'ÄÖÜ'],
            [true, 'VALID'],
            [true, 'ÇÃÊ'],
            [true, '123'],
            [true, 'A1'],
            [true, '_'],
            [true, '!'],
            [true, 'A-B'],
            [true, 'A B'],
            [true, '?'],
            [true, '#'],
            [true, 'FOO BAR'],
            [false, 'a'],
            [false, 'foo bar'],
            [false, 'fooß'],
            [false, 'abc'],
            [false, 'äöü'],
            [false, '(a)'],
        ];
    }
}

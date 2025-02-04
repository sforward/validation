<?php

declare(strict_types=1);

namespace Intervention\Validation\Tests\Rules;

use Intervention\Validation\Rules\Lowercase;
use PHPUnit\Framework\TestCase;

class LowercaseTest extends TestCase
{
    /**
     * @dataProvider dataProvider
    */
    public function testValidation($result, $value)
    {
        $valid = (new Lowercase())->isValid($value);
        $this->assertEquals($result, $valid);
    }

    public function dataProvider()
    {
        return [
            [true, 'a'],
            [true, 'abc'],
            [true, 'ß'],
            [true, 'êçã'],
            [true, 'valid'],
            [true, 'foo bar'],
            [true, 'foo-bar'],
            [true, '!'],
            [true, '?'],
            [true, '9'],
            [true, '#'],
            [false, 'A'],
            [false, 'ABC'],
            [false, 'Ä'],
            [false, 'ÄÖÜ'],
            [false, 'VALID'],
            [false, 'ÇÃÊ'],
        ];
    }
}

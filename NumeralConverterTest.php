<?php
    use PHPUnit\Framework\TestCase;
    require 'NumeralConverter.php';

    final class NumeralConverterTest extends TestCase
    {
        /**
         * @dataProvider argumentProvider
         */
        public function testCanCheckNumbers($arg, $expected)
        {
            $this->assertSame(NumeralConverter::CheckIfNumber($arg), $expected);
        }

        public function argumentProvider()
        {
            return [
                [32, true],
                ["32", true],
                ["hi", false],
                [88, true]
            ];
        }
    }
?>
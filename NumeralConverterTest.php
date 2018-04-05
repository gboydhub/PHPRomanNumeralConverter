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

        /**
         * @dataProvider romanProvider
         */
        public function testCanCheckRoman($arg, $expected)
        {
            $this->assertSame(NumeralConverter::CheckIfRoman($arg), $expected);
        }

        public function romanProvider()
        {
            return [
                [32, false],
                ["32", false],
                ["IV", true],
                ["LXII", true],
                ["LXHI", false]
            ];
        }

        /**
         * @dataProvider convertnumProvider
         */
        public function testCanConvertRomanToNum($arg, $expected)
        {
            $this->assertSame(NumeralConverter::ConvertToNumber($arg), $expected);
        }

        public function convertnumProvider()
        {
            return [
                [32, 0],
                ["32", 0],
                ["IV", 4],
                ["CXXVIII", 128],
                ["LXHI", 0]
            ];
        }
    }
?>
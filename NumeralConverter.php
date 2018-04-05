<?php
    final class NumeralConverter
    {
        public static $romanPairs = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );

        public static function CheckIfNumber($data)
        {
            if(is_int($data))
            {
                return true;
            }
            if(intval($data) > 0)
            {
                return true;
            }
            return false;
        }

        public static function CheckIfRoman($data)
        {
            if(!is_string($data))
            {
                return false;
            }
            if(preg_replace('~[MDCLXVI]~', '', $data) == "")
            {
                return true;
            }
            return false;
        }

        public static function ConvertToNumber($roman)
        {
            if(!static::CheckIfRoman($roman))
            {
                return 0;
            }

            $retval = 0;
            foreach(static::$romanPairs as $key => $val)
            {
                while(strpos($roman, $key) === 0)
                {
                    $retval += $val;
                    $roman = substr($roman, strlen($key));
                }
            }

            if(strlen($roman) > 0)
            {
                return 0;
            }
            return $retval;
        }

        public static function ConvertToRoman($num)
        {
            if(!static::CheckIfNumber($num))
            {
                return "";
            }
        
            $numeralString = "";
            $decimal = array(1000, 500, 100, 50, 10, 5, 1);
            $numeral = array("M", "D", "C", "L", "X", "V", "I");
        
            for($i = 0; $i < count($decimal); $i++)
            {
                while($num % $decimal[$i] < $num)
                {
                    $numeralString = $numeralString . $numeral[$i];
                    $num -= $decimal[$i];
                }
            }

            return $numeralString;
        }
    }
    /*
    $usrNum = $_POST['usrInput'];
    $numeralString = "";
    $decimal = array(1000, 500, 100, 50, 10, 5, 1);
    $numeral = array("M", "D", "C", "L", "X", "V", "I");

    for($i = 0; $i < count($decimal); $i++)
    {
        while($usrNum % $decimal[$i] < $usrNum)
        {
            $numeralString = $numeralString . $numeral[$i];
            $usrNum -= $decimal[$i];
        }
    }

    echo $numeralString;*/
?>
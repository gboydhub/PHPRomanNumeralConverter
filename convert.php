<?php
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

    echo $numeralString;
?>
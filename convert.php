<?php
    require "NumeralConverter.php";

    $data = $_POST["usrInput"];
    if(!NumeralConverter::CheckIfNumber($data) && !NumeralConverter::CheckIfRoman($data))
    {
        die("Please enter a valid number or roman numeral.<br>Must be greater than 0.");
    }

    if(NumeralConverter::CheckIfNumber($data))
    {
        $result = NumeralConverter::ConvertToRoman(intval($data));
        if($result == "")
        {
            die("Please enter a valid number.<br>Must be greater than 0.");
        }
        echo $result;
    }
    else
    {
        $result = NumeralConverter::ConvertToNumber($data);
        if($result == 0)
        {
            die("Please enter a valid roman numeral.");
        }
        echo $result;
    }
?>
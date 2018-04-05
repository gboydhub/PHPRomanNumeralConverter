<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">
function SetStatus(text)
{
    document.getElementById("rResult").innerHTML = text;
}
function PostData(data, url)
{
    $.ajax({
        type:"post",
        url: url,
        data: data,
        cache: false,
        success: function(result)
        {
            SetStatus(result);
        }
    });
}

$(document).ready(function(){
    $("#change").click(function(){
        var usrInput = $("#usrInput").val();
        var formData = "usrInput=" + usrInput;
        var pageURL = "convert.php";
        if(usrInput == '')
        {
            SetStatus("Please enter a number");
        }
        else
        {
            PostData(formData, pageURL);
        }
        return false;
    });
});
</script>
<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<p class="romanHeader">Roman Numeral Converter</p>
<form>
    <input type=text name="usrInput" id="usrInput"><br>
    <input type=submit name="change" id="change">
</form>
<p class="rResult" id="rResult"></p>
</center>

    <code><?= __FILE__ ?></code>
</div>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php 
echo date("H:i:s");
?>

<div id="qrimage"></div>

<script type="text/javascript">
setTimeout(function(){  location.reload();  },10000);  //1000 = 1 seg

<?php
$dato="hola";
echo(" document.getElementById(\"qrimage\").innerHTML=\"<img src=\'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$dato\'>\";  ");
?>

</script>


</body>
</html>
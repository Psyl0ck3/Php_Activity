<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ANSWER</title>
</head>
<body>
<?php 
   session_start();
   if (isset($_POST['btn_submit'])) {
        $a = $_POST['FirstNum'];
        $b = $_POST['SecondNum'];
        $c = $_POST['ThirdNum'];
        
   }

   //calculate
    $d = $b * $b - (4 * $a * $c);

    echo "{$d}";

    
?>
</body>
</html>
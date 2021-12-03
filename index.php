<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$favColor = "red";

switch($favColor)
{
        case "red":
            echo "your favourite color is red!";
            break;
        case "yellow":
            echo "your favourites color is blue!";
            break;
        case "green":
            echo "your favourites color is red!";
            break;
            default:
            echo "your favourites color is neither green or blue or red";
}

?>
    
</body>
</html>
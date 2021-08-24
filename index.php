<?php
require __DIR__.'/vendor/autoload.php';
use App\Controllers\textTransformator;
$inString = "Привет! Давно не виделись.";
$transformator = new textTransformator();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Исходная строка</td>
            <td><?php echo $inString; ?></td>
        </tr>
        <tr>
            <td>Выходная строка</td>
            <td><?php echo $transformator->revertCharacters($inString); ?></td>
        </tr>
    </table>
</body>
</html>
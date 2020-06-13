<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?PHP
echo shell_exec("python landmarkDetector.py -i img/paul_goughin.png");
echo shell_exec("python landmarkDetector.py -i img/van_gogh.png");
echo shell_exec("python delaunay.py -i img/paul_goughin.png");
echo shell_exec("python delaunay.py -i img/van_gogh.png");
echo shell_exec("python faceMorph.py -i1 img/paul_goughin.png -i2 img/van_gogh.png -f 30");
?>
</body>
</html>
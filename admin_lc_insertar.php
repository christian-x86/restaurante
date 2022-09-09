<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>    
    <?php
    var_dump($_POST);
    ?>
    </pre>
    <?php
    // echo $_POST['formato'][0].", ";
    // echo $_POST['precio'][0]."<br>";
    // echo $_POST['formato'][1].", ";
    // echo $_POST['precio'][1];

    foreach ($_POST as $key => $value) {
        echo $key."<br>";
        foreach ($value as $key1 => $value1) {
            echo "- ".$key1.": ".$value1."<br>";
        }
    }
    ?>
    
</body>
</html>
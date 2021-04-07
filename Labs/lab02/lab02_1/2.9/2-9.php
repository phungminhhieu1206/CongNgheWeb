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
        $name = $_POST["name"];
        $class = $_POST["class"];
        $uni = $_POST["uni"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        
        print("<br>Hello, $name");
        print("<br>You are studying at $class, $uni<br> Gender: $gender");
        print("<br>Your country: $country");
        print("<br><br>Your hobbies is: <br>");
        if (!empty($_POST["hb"]))
            foreach($_POST["hb"] as $key => $value){
                $key++;
                print("$key. $value <br>");
            }
        else 
            print("<br>?");
    ?>
</body>
</html>
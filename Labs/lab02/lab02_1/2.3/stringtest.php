<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Basic PHP syntax-->
    <p>This is going to be ignored by the PHP interpreter.</p>
    <?php echo '<p>While this is going to be parsed.</p>'; ?>
    <p>This will also be ignored by the PHP preprocessor.</p>
    <?php print('<p>Hello and welcome to <i>my</i> page!</p>') ;?>
    <?php //This is a comment
    /* This is
    a comment
    block */ ?>

    <!--Scalars-->
    <p>
    <?php 
        $foo = true;
        if ($foo) echo "It is TRUE! <br/>";
        $txt = '1234'; echo "$txt <br/> \n";
        $a = 1234;
        echo "$a </br> \n";
        $a = -123;
        echo "$a <br/> \n";
        $a = 1.234;
        echo "$a <br /> \n";
        $a = 7E-10;
        echo "$a <br/> \n";
        echo 'Arnold once said: "I\'ll be back"', "<br/> \n";
        $beer = 'Heineken';
        echo "$beer's taste is great <br/> \n";
        $str = <<<EOD
        Example of string
        spanning multiple lines
        using "heredoc" syntax.
        EOD;
        echo $str;
    ?>
    </p>

    <!--Arrays-->
    <?php 
        $arr = array("foo" => "bar", 12 => true);
        echo $arr["foo"];//bar
        echo $arr[12];
        array(5=>43,32,56,"b"=>12);
        array(5=>43,6=>32,7=>56,"b"=>12); 
        $arr = array(5=>1,12=>2);
        foreach ($arr as $key=>$value)
            {echo $key, '=>',$value;}
        $arr[] = 56;
        $arr["x"] = 42;
        unset($arr[5]);
        unset($arr);
        $a = array(1=>'one',2=>'two',3=>'three');
        unset($a[2]);
        $b = array_values($a);
    ?>

    <!--Constants-->
    <?php
        define("FOO", "something");
        define("FOO2", "something else");
        define("FOO_BAR", "something more");
        
        define("2FOO", "something");
        define("__FOO__","something");
    ?>

    <!--operators-->
    <?php
        $a = "Hello";
        $b = $a."World!";
        $a = "Hello";
        $a .= "World!";
    ?>

    <!--conditionals: if else-->
    <?php
        $d = date("D");
        echo $d, "<br/>";
        if ($d = "Fri")
            echo "Have a nice weekend! <br/>";
        else 
            echo "Have a nice day! <br/>";
        $x = 10;
        if ($x == 10)
        {
            echo "Hello <br/>";
            echo "Good morning <br/>";
        }
    ?>

    <!--conditionals: switch-->
    <?php
        $x = rand(1,5);
        echo "x = $x <br/><br/>";
        switch ($x)
        {
            case 1:
                echo "Number 1";
                break;
            case 2:
                echo "Number 2";
                break;
            case 3:
                echo "Number 3";
                break;  
            default:
                echo "No number between 1 and 3";
                break;
        }
    ?>

    <!--looping: while and do while-->
    <?php
        $i = 1;
        while ($i <= 5)
        {
            echo "The number is $i <br/>";
            $i++;
        }
        $i = 0;
        do
        {
            $i++;
            echo "The number is $i <br/>";
        }
        while ($i <= 10);
    ?>

    <!--looping: for and foreach-->
    <?php
        for ($i=1 ; $i<=5; $i++)
            echo "Hello World!<br/>";
        $a_array = array(1,2,3,4);
        foreach ($a_array as $value)
        {
            $value = $value * 2;
            echo "$value <br/>\n";
        }
    ?>

    <!--Uses Defined Functions-->
    <?php
        function square($num)
            {return $num * $num;}
        echo square(4);
        function small_numbers()
            {return array(0,1,2);}
        list($zero,$one,$two) = small_numbers();
        echo $zero,$one,$two;
        function takes_array($input)
        {
            echo "$input[0] + $input[1] = ", $input[0]+$input[1];
        }
        takes_array(array(1,2));
    ?>

    <!--Variabel scope-->
    <?php
        $a = 1;
        function Test()
        {
            echo $a;
        }
        Test();
        //THe scope is local within functions, and hence the value of $a is undefined in the "echo" statement
    ?>
    <?php
        $a = 1;
        $b = 2;
        function Sum()
        {
            global $a, $b;
            $b = $a + $b;
        }
        Sum();echo $b;
    ?>
    <?php
        function Test1()
        {
            static $a = 0;
            echo $a;
            $a++;
        }
        Test1();
        Test1();
        Test1();
    ?>
    
    <!--Including files-->
    <?php
        echo "A $color $fruit";
        include 'vars.php';
        echo "A $color $fruit";
    ?>
    <?php
        function foo()
        {
            global $color;
            include ('vars.php');
            echo "A $color $fruit";
        }
        foo();
        echo "A $color $fruit";
    ?>

    <!--PHP information-->
    <?php
        phpinfo();
    ?>
    <?php
        phpinfo(INFO_GENERAL);
    ?>

    <!--Server variables-->
    <?php
        echo "Referer: ".$_SERVER["HTTP_REFERER"]."<br/>";
        echo "Browser: ".$_SERVER["HTTP_USER_AGENT"]."<br/>";
        echo "User's IP address: ".$_SERVER["REMOTE_ADDR"];
    ?>
    <?php
        echo "<br/><br/><br/>";
        echo "<h2>All information</h2>";
        foreach ($_SERVER as $key => $value)
            {
                echo $key." = ".$value."<br/>";
            }
    ?>

    <!--File open-->
    <?php
        $fh-fopen("welcome.txt","r");
    ?>
    <?php
        if (!$fh=fopen("welcome.txt","r"))
            exit("Unable to open file!");
    ?>

    <!--File workings-->
    <?php
        $myFile = "welcome.txt";
        if (!($fh=fopen($myFile,'r')))
            exit("Unable to open file.");
        while (!feof($fh))
        {
            $x = fgetc($fh);
            echo $x;
        }
        fclose($fh);
    ?>
    <?php
        $myFile = "welcome.txt";
        $fh = fopen($myFile, 'r');
        $thedata = fgets($fh);
        fclose($fh);
        echo $theData;
    ?>
    <?php
        $lines = file('welcome.txt');
        foreach($lines as $l_num => $line)
        {
            echo "Line #{$l_num}:".$line."<br/>";
        }
    ?>
    <?php
        $myFile = "testFile.txt";
        $fh = fopen($myFile,'a') or die("can't open file");
        $stringData = "New Stuff 1\n";
        fwrite($fh, $stringData);
        $stringData = "New Stuff 2\n";
        fwrite($fh,$stringData);
        fclose($fh);
    ?>

    <!--Form handling-->
    <form action="welcome.php" method="post">
        Enter your name: <input type="text" name="name"/><br/>
        Enter your age: <input type="text" name="age"/> <br/>
        <input type="submit"/> <input type="reset">
    </form>

    <!--Cookie Workings-->
    <?php
        setcookie("uname", $_POST["name"], time()+36000);
    ?>
    <p>
        Dear <?php echo $_POST["name"]; ?>, a cookie was set on this
        page! The cookie will be active when the client has sent the
        cookie back to the server.
    </p>
    <?php
        if (isset($_COOKIE["uname"]))
            echo "Welcome ".$_COOKIE["uname"]."!<br/>";
        else echo "you are not logged in!<br/>";
    ?>

    <!--Getting Time and Date-->
    <?php
        $nextWeek = time() + (7 * 24 * 60 * 60);
        echo 'Now: '. date('Y-m-d') ."\n";
        echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";
    ?>

    <!--Required Fields in User-Entered Data-->
    <?php
        function print_form($f_name, $l_name, $email, $os)
        {
    ?>
    <form action="form_checker.php" method="post">
        First Name: <input type="text" name="f_name" value="<?php echo $f_name?>" /> <br/>
        Last Name <b>*</b>:<input type="text" name="l_name" value="<?php echo $l_name?>" /> <br/>
        Email Address <b>*</b>:<input type="text" name="email" value="<?php echo $email?>" /> <br/>
        Operating System: <input type="text" name="os" value="<?php echo $os?>" /> <br/><br/>
        <input type="submit" name="submit" value="Submit" /> <input type="reset" />
    </form>
    <?php
        }
        function check_form($f_name, $l_name, $email, $os)
        {
            if (!$l_name||!$email){
            echo "<h3>You are missing some required fields!</h3>";
            print_form($f_name, $l_name, $email, $os);
        }
        else {
            confirm_form($f_name, $l_name, $email, $os);
        }
        } //** end of "check_form" function
            function confirm_form($f_name, $l_name, $email, $os)
        {
    ?>
    <h2>Thanks! Below is the information you have sent to us.</h2>
    <h3>Contact Info</h3>
    <?php
        echo "Name: $f_name $l_name <br/>";
        echo "Email: $email <br/>";
        echo "OS: $os";
        } //** end of "confirm_form" function
        if (!$_POST["submit"])
        {
    ?>
    <h3>Please enter your information</h3>
    <p>Fields with a "<b>*</b>" are required.</p>
    <?php
            print_form("","","","");
        }   
        else{
            check_form($_POST["f_name"],$_POST["l_name"],$_POST["email"],$_POST["os"]);
        }
    ?>
</body>
</html>
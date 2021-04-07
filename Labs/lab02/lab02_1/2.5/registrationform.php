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
    /*declare some functions*/
    function print_form($f_name, $l_name, $email, $os)
    {
        ?>
        <form action="" method="post">
            First Name: <input type="text" name="f_name" value="<?php echo $f_name?>" /> <br/>
            Last Name <b>*</b>:<input type="text" name="l_name" value="<?php echo $l_name?>" /> <br/>
            Email Address <b>*</b>:<input type="text" name="email" value="<?php echo $email?>" /> <br/>
            Operating System: <input type="text" name="os" value="<?php echo $os?>" /> <br/><br/>
            <input type="submit" name="submit" value="Submit" /> <input type="reset" />
        </form>
        <?php
    } //** end of "print_form" function
    function check_form($f_name, $l_name, $email, $os)
    {
        if (!$l_name||!$email){
            echo "<h3>You are missing some required fields!</h3>";
            print_form($f_name, $l_name, $email, $os);
        }
        else{
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
    /*Main Program*/
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
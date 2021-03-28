<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
    <font size="5" color="blue">
    Enter your name and select date and time for the appointment</font>
    <br><br>
        <?php
            if (array_key_exists("name", $_GET)) {
                $name = $_GET["name"];
                $second = $_GET["second"];
                $minute = $_GET["minute"];
                $hour = $_GET["hour"];
                $day = $_GET["day"];
                $month = $_GET["month"];
                $year = $_GET["year"];
            } else {
                $name = "";
                $second = 0;
                $minute = 0;
                $hour = 0;
                $day = 1;
                $month = 1;
                $year = 2000;
            }
        ?>
        <table>
            <tr>
                <td>Your name: </td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td><select name="day">
                    <?php
                        for ($i=1 ; $i<32 ; $i++)
                            if ($day == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                </select>
                <select name="month">
                    <?php
                        for ($i=1 ; $i<13 ; $i++)
                            if ($month == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                </select>
                <select name="year">
                    <?php
                        for ($i=2000 ; $i<2501 ; $i++)
                            if ($year == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>Time: </td>
                <td><select name="hour">
                    <?php
                        for ($i=0 ; $i<24 ; $i++)
                            if ($hour == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                    
                </select>
                <select name="minute">
                    <?php
                        for ($i=0 ; $i<60 ; $i++)
                            if ($minute == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                </select>
                <select name="second">
                    <?php
                        for ($i=0 ; $i<60 ; $i++)
                            if ($second == $i)
                                print("<option selected>$i</option>");
                            else print ("<option>$i</option>");
                    ?>
                </select></td>
            </tr>
            <tr>
                <td align="right"><input type="submit" name="to_submit" value="Submit"></td>
                <td align="left"><input type="reset" name="to_reset" value="Reset"></td>
            </tr>            
        </table>
        <?php
            $n_day = $day; //next_day
            $n_month = $month;
            $n_year = $year;
            $check_valid = true;
            $check_leap_year = (($year % 400 == 0) || (($year % 100 != 0) && ($year % 4 == 0))) ? true:false;
            $AM_PM = $hour < 12 ? "PM":"AM";//đặt ngược lại
            $_31 = array(1,3,4,5,6,7,8,9,10,12);
            $_30 = array(4,6,9,11);

            $feb = $check_leap_year ? 29:28;
            $_month = array(0=>0,1=>31,2=>$feb,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
            //number of days
        
            $day_max = $_month[$month];

            if ($day > $_month[$month])
                $check_valid = false;

            if ($hour >= 12) //next 12 hours => next day => next month ? => next year
            {
                if ($day == $day_max)
                {
                    $day = 1;
                    if ($month == 12)
                    {
                        $month = 1;
                        $year++;
                        if ($year > 2500) $check_valid = false;//max_year
                    }
                }
            }

            if (isset($_GET["to_submit"]))
            {
                if ($check_valid==false)
                {
                    print "<br>Hi $name!<br>"; 
                    print "Your date you chose is invalid or full memory. Please choose again !";
                }
                else    
                {
                    print "<br>Hi $name!<br>"; 
                    print "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year<br><br>";
                    print "More information<br><br>";
                    $hour -= ($hour + 12 >= 24) ? 12 : 0;
                    print "In 12 hours, the time and date is $hour:$minute:$second $AM_PM, $n_day/$n_month/$n_year<br><br>";
                    print "This month has $day_max days !";
                }
            }
        ?>     
    </form>
</body>
</html>
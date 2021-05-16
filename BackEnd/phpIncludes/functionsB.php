<?php
    function successMsg()
    {
        print 'Sesión Iniciada';
        /*if(isset($_SESSION['login'])){
            print 'Cuentra Creada';
        }
        else{

        }*/
    }


    function confirm($msg){
        echo("  
            <script>
                if (confirm('$msg')) {
                }
                else{
                }
            </script>");
    }


    function addUSD($numberMoney)
    {
        if(empty($numberMoney))
            $numberMoney2 = "$0.00";
        else
            $numberMoney2 = "$".$numberMoney;
        return $numberMoney2;
    }


    function numberToPercent($num)
    {
        //number_format((float)$num, 2, '.', ',');
        $numPerc = round($num, 2)."%";
        return $numPerc;
    }

    function dayOfYearToJMY($day)
    {
        $dayJMY = DateTime::createFromFormat('z', $day)->format('j-M-Y');
        return $dayJMY;
    }


    function weekOfYearToJMY($week)
    {
        $year = date('Y');

        $dateTime = new DateTime();
        $dateTime->setISODate($year, $week);
        $result['start_date'] = $dateTime->format('d-M');
        $dateTime->modify('+6 days');
        $result['end_date'] = $dateTime->format('d-M');
        return $result;
    }


    function monthOfYearToJMY($month)
    {
        $monthJMY = DateTime::createFromFormat('m', $month)->format('M-Y');
        return $monthJMY;
    }


    function encrypt($password)
    {
        $md5Pass = md5($password);  //encriptación de password a md5
        $cryptPass = crypt($md5Pass, 'q/Bx'); //encriptación de password md5 a crypt
        return $cryptPass;
    }


    function login($email, $cryptPass)
    {
        include 'connection.php';
        $query = "SELECT admin_id FROM Administrator WHERE email = '$email' and password = '$cryptPass'";
        $r = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($r);

        $_SESSION['login'] = $row['user_id'];
        //$_SESSION['cart_product'] = array();
        //$_SESSION['cart_quantity'] = array();
    }


    function logoutToIndex()
    {
        session_start();
        session_destroy();
    
        header('location: ../index.php');
    }


    function recaptcha()
    {
        $secretKey = "6LfOd7YaAAAAAMCf44lxoBDDuVYCPrwGd1hmQQwo";
        $responseKey = $_POST['g-recaptcha-response'];
        $urlResponse = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
        $response = file_get_contents($urlResponse);
        $response = json_decode($response);
        //echo $response;
        /*on code
            below session:
                include 'phpIncludes/recaptcha.php';

            on form before closing, </form>, key:
                <div class="g-recaptcha" data-sitekey="6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB"></div>

            before closing body, </body>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        */
        return $response;
    }

    
    function recaptchaAndIP()
    {
        $secretKey = "6LfOd7YaAAAAAMCf44lxoBDDuVYCPrwGd1hmQQwo";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $urlResponse = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($urlResponse);
        $response = json_decode($response);
        /*on code
            below session:
                include 'phpIncludes/recaptcha.php';

            on form before closing, </form>, key:
                <div class="g-recaptcha" data-sitekey="6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB"></div>

            before closing body, </body>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        */
    }

?>
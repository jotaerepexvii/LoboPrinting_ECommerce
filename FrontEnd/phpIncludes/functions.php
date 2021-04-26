<?php
    

    function encrypt($password)
    {
        $md5Pass = md5($password);  //encriptación de password a md5
        $cryptPass = crypt($md5Pass, 'q/Bx'); //encriptación de password md5 a crypt
        return $cryptPass;
    }

    function login($email, $cryptPass)
    {
        include 'phpIncludes/connection.php';
        $query = "SELECT user_id FROM Users WHERE email = '$email' and password = '$cryptPass'";
        $r = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($r);

        $_SESSION['login'] = $row['user_id'];
        $_SESSION['cart_product'] = array();
        $_SESSION['cart_quantity'] = array();
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
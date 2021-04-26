<?php
    function errorLogin($email, $pass)
    {

    }


    function verificarLogin($user)
    {
        if($user == '1')
        {
            return;
        }
        else
        {
            header('location: login.php');	
        }
    }


    function logout()
    {
        session_start();
        session_destroy();
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
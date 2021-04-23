<?php
    $secretKey = "6LfOd7YaAAAAAMCf44lxoBDDuVYCPrwGd1hmQQwo";
    $responseKey = $_POST['g-recaptcha-response'];
    //$userIP = $_SERVER['REMOTE_ADDR'];
    $urlResponse = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    //$urlResponse = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
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
?>

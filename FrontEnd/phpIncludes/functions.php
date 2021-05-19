<?php
    function successMsg()
    {
        print 'Sesión Iniciada';
        /*if(isset($_SESSION['login'])){
            print 'Cuentra Creada';
        }else{
        }*/
    }


    function encrypt($password)
    {// recibe password y lo devuelve encriptado
        $md5Pass = md5($password);  //encriptación de password a md5
        $cryptPass = crypt($md5Pass, 'q/Bx'); //encriptación de password md5 a crypt
        return $cryptPass;
    }


    function login($email, $cryptPass)
    {// hace login del usuario
        include 'phpIncludes/connection.php';
        $query = "SELECT user_id FROM Users WHERE email = '$email' and password = '$cryptPass'";
        $r = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($r);

        $_SESSION['login'] = $row['user_id'];
        //$_SESSION['cart_product'] = array();
        //$_SESSION['cart_quantity'] = array();
    }

    
    function addUSD($numberMoney)
    {// convierte un numero como '25' a '$25:00'
        if(empty($numberMoney))
            $numberMoney2 = "$0.00";
        else
            $numberMoney2 = "$".number_format((float)$numberMoney, 2, '.', ',');
        return $numberMoney2;
    }

    
    function his24togis12($date24)
    {// convert full date in 24h format to 12h format
        $date12 = new DateTime($date24);
        return $date12->format('g:i:s a m/d/Y');
        //se usa 'g' en vez de 'h' en 'g:i:s'
        //para eliminar el 0 al principio de una hora como: '07:12:28'
    }

    
    function validateZipCode($zipCode)
    {// valida que el zip code sea de 5 caracteres y que cada caracter sea un numero del 1 al 9
        if (preg_match('#[0-9]{5}#', $zipCode))
            return true;
        else
            return false;
    }


    function logoutToIndex()
    {// si es llamada, esta funcion realiza logout de usuario
        session_start();
        session_destroy();
    
        header('location: ../index.php');
    }


    function recaptcha()
    {// google recaptcha donde se definen los keys y etc
        $secretKey = "6LfOd7YaAAAAAMCf44lxoBDDuVYCPrwGd1hmQQwo";
        $responseKey = $_POST['g-recaptcha-response'];
        $urlResponse = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
        $response = file_get_contents($urlResponse);
        $response = json_decode($response);

        return $response;
        //echo $response;
        /*en el código
            below session:
                include 'phpIncludes/recaptcha.php';

            on form before closing, </form>, key:
                <div class="g-recaptcha" data-sitekey="6LfOd7YaAAAAAKDfXyWBTAbjZKPhhzXg-8jWqExB"></div>

            before closing body, </body>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

            to ask if recaptcha is successfull:

                $response = recaptcha();
                if ($response->success){
                    //then is succesfull
                }
                else{
                    //then is not succesfull
                }
        */
    }

    
    function recaptchaAndIP()
    {// same as recaptcha pero devuelve tambien el ip del usuario donde se hizo el recaptcha
        //No se esta utilizando
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
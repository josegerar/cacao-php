<?php

require_once $GLOBALS['ROOT'] . "/config/configApp.php";

class mainModel
{
    protected static function getConnection()
    {
        $link = new PDO(SGBD, USER, PASSWORD);
        return $link;
    }

    public function executeQuery($query)
    {
        $result = self::getConnection()->prepare($query);
        $result->execute();
        return $result;
    }

    public function encrypt($string)
    {
        $output = false;
        $key = hash("sha256", SECRET_KEY);
        $iv = substr(hash("sha256", SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public function decrypt($string)
    {
        $key = hash("sha256", SECRET_KEY);
        $iv = substr(hash("sha256", SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
    
    protected function createCodeRamdom($key, $lengh, $number)
    {
        for ($i = 1; $i <= $lengh; $i++) {
            $n = rand(0, 9);
            $key .= $n;
        }
        return $key . $number;
    }
    
}

<?php

namespace Gabriel\Crypto;

class Crypto{

    
    public function encrypt($text, $hash = "sha512", $phrase = "G#ta!nb0iRcE)t@a", $interations = 256, 
    $cipher = "aes-256-cbc", $options = OPENSSL_RAW_DATA){

        try {
            $salt = openssl_random_pseudo_bytes(256);
            $iv = openssl_random_pseudo_bytes(16);
    
            $key = hash_pbkdf2($hash, $phrase, $salt, $interations, 64);
            $msg_encriptada = openssl_encrypt($text, $cipher, hex2bin($key), $options, $iv);
            $msg = array("msg_crypt" => base64_encode($msg_encriptada), "iv" => bin2hex($iv), "salt" => bin2hex($salt));
            
            return json_encode($msg);

        }catch(\Exception $e) { 
            return $e; 
        }    
    }

    
    public function descrypt(string $json_crypt, $hash = "sha512", $phrase = "G#ta!nb0iRcE)t@a", $interations = 256, 
    $cipher = "aes-256-cbc", $options = OPENSSL_RAW_DATA){
     
        try {
            $jsondata       = json_decode($json_crypt);
            $salt           = hex2bin($jsondata->salt);
            $iv             = hex2bin($jsondata->iv);
            $text_encrypt   = base64_decode($jsondata->msg_crypt);

            $key = hash_pbkdf2($hash, $phrase, $salt, $interations, 64);
            $decrypted= openssl_decrypt($text_encrypt , $cipher, hex2bin($key), $options, $iv); 

            return $decrypted;
        }catch(\Exception $e) { 
            return $e; 
        }
        
    }

    public function getMethodCipher(){
        return openssl_get_cipher_methods();
    }

    public function getMethodHash(){
        return hash_algos();  
    }

    public function getMethodOptions(){
        return [
            "1" => "OPENSSL_RAW_DATA ",
            "2" => "OPENSSL_ZERO_PADDING"
        ];  
    }

}
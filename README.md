# Biblioteca para criptografia de dados em PHP

Essa biblioteca realiza a criptografia de dados em PHP usando o openssl.

## Abaixo segue um exemplo básico de seu uso.
```php
<?php
use Gabriel\Crypto\Crypto;

# IMPORTANDO O AUTOLOAD
require_once __DIR__ . "/vendor/autoload.php";

# INSTANCIANDO A CLASSE
$crypt = new Crypto();

# TEXTO A SER CRIPTOGRAFADO
$texto = "Texto a ser criptografado";

echo "Texto normal: " . $texto;
echo "<br>";

# CRIPTOGRAFANDO O TEXTO USANDO OS PARAMETROS BASE
$texto_encrypt = $crypt->encrypt($texto);
echo "Texto encriptografado: " . $texto_encrypt;
echo "<br>";

# DESCRIPTOGRAFANDO O TEXTO USANDO OS PARAMETROS BASE.
$texto_descrypt = $crypt->descrypt($texto_encrypt);
echo "Texto descriptografado: " . $texto_descrypt;
echo "<br>";
?>
```
No exemplo acima foi usado os parametros padrões, porém eles podem ser configurados da forma que preferir.

## PARA SABER TODOS OS TIPOS DE CIPHERS
```php
<?php
$obj_cipher = $crypt->getMethodCipher();

echo "<pre>";
print_r($obj_cipher);
echo "</pre>";
?>
```
# PARA SABER TODOS OS TIPOS DE HASH
$obj_hash = $crypt->getMethodHash();

echo "<pre>";
print_r($obj_hash);
echo "</pre>";

# PARA SABER TODOS OS TIPOS DE OPTIONS
$obj_options = $crypt->getMethodOptions();

echo "<pre>";
print_r($obj_options);
echo "</pre>";


'''

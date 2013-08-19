<?php
/**
 *  Encryption / Decryption using 256 bit encryption.
 *
 * This class is meant to facilitate encryption / decryption of keys using device identity.
 */

function mencrypt($string,$key) {
  $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
  return $encrypted;
}

function mdecrypt($string,$key) {
  $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
  return $decrypted;
}

?>

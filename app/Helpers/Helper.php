<?php

if (!function_exists('generate_random_string')) {

    function generate_random_string($length = 9)
    {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      return $randomString;
    }
}

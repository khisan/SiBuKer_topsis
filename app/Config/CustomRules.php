<?php

namespace Config;

//--------------------------------------------------------------------
// Custom Rule Functions 
//--------------------------------------------------------------------

class CustomRules
{
  public function nimCheck(string $str, string &$error = null): bool
  {
    $cek = substr($str, -5, 2);
    if ($cek == "18") {
      return true;
    } elseif ($cek == "51") {
      return true;
    } elseif ($cek == "11") {
      return true;
    } elseif ($cek == "53") {
      return true;
    } elseif ($cek == "13") {
      return true;
    } elseif ($cek == "51") {
      return true;
    } elseif ($cek == "12") {
      return true;
    } elseif ($cek == "14") {
      return true;
    } elseif ($cek == "21") {
      return true;
    } elseif ($cek == "26") {
      return true;
    } elseif ($cek == "24") {
      return true;
    } elseif ($cek == "25") {
      return true;
    } elseif ($cek == "22") {
      return true;
    } else {
      return false;
    }
  }
}

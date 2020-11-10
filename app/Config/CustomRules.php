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
    if ($str == "18") {
      return true;
    } elseif ($str == "51") {
      return true;
    } elseif ($str == "11") {
      return true;
    } elseif ($str == "53") {
      return true;
    } elseif ($str == "13") {
      return true;
    } elseif ($str == "51") {
      return true;
    } elseif ($str == "12") {
      return true;
    } elseif ($str == "14") {
      return true;
    } elseif ($str == "21") {
      return true;
    } elseif ($str == "26") {
      return true;
    } elseif ($str == "24") {
      return true;
    } elseif ($str == "25") {
      return true;
    } elseif ($str == "22") {
      return true;
    } else {
      return false;
    }
  }
}

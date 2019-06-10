<?php

function strrevpos($instr, $needle){

    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);

};

function after ($th_is, $inthat){

   if (!is_bool(strpos($inthat, $th_is)))
   return substr($inthat, strpos($inthat,$th_is)+strlen($th_is));

};

function after_last ($th_is, $inthat){

   if (!is_bool(strrevpos($inthat, $th_is)))
   return substr($inthat, strrevpos($inthat, $th_is)+strlen($th_is));

};

function before ($th_is, $inthat){

   return substr($inthat, 0, strpos($inthat, $th_is));

};

function before_last ($th_is, $inthat){

   return substr($inthat, 0, strrevpos($inthat, $th_is));

};

function between ($th_is, $that, $inthat){

   return before ($that, after($th_is, $inthat));

};

function between_last ($th_is, $that, $inthat){

  return after_last($th_is, before_last($that, $inthat));

};
?>
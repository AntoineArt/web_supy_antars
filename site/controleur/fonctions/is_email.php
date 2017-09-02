<?php
/*
   Auteur: Frapiccini Benoît
   Cette fonction détermine si une chaîne de caractère est une adresse mail valide
*/

function is_email($mail)
{
   $isemail = true;
   if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){
      $isemail = false;
   }

   return $isemail;
}

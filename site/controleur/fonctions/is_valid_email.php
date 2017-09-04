<?php
/*
   Auteur: Frapiccini Benoît
   Cette fonction détermine si une chaîne de caractère est un mot de passe valide
*/

function is_valid_email($mail)
{
   $isemail = true;
   if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){
      $isemail = false;
   }

   return $isemail;
}

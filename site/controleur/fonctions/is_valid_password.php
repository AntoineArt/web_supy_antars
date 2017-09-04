<?php
/*
   Auteur: Frapiccini Benoît
   Cette fonction détermine si une chaîne de caractère est une adresse mail valide
*/

function is_valid_password($mdp)
{
   $isvalid = true;
   if (ctype_lower($mdp) OR ctype_upper($mdp) OR (strlen($mdp)<6)){
      $isvalid = false;
   }

   return $isvalid;
}

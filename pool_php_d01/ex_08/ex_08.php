<?php

/*$my_array = array('to', 42, 'Glory', 42.42, 'Geckos');*/

  function print_array ($my_array)
{

  foreach ($my_array as &$value){

    echo "$value", "\n";
  }
}
/*print_array($my_array); */

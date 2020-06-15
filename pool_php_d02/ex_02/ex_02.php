<?php
function my_create_map(...$array){

foreach ($array as $key){


    if($key && sizeof($key)> 1){
    $temp_array[$key[0]] = $key[1];
    }

    else{
      echo "The given arguments aren’t valid\n";
      return NULL;
      }


  }return $temp_array;
}

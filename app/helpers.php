<?php
use App\Models\BasicSettings;

if (!function_exists('basic_settings')) {
  function basic_settings()
  {
    $settings=BasicSettings::all();
    if ($settings) {
        return $settings;
    }else {
      return [];
    }


  }

}




 ?>

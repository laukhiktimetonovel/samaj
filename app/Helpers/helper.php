<?php

   if (!function_exists('get_advertisements')) {
       function get_advertisements()
       {
           return \App\Models\Advertisement::where('is_active', true)->get();
       }
   }
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

const LOADER = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin ms-2">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>';
const LOCATION = [
  1 => 'Africa',
  2 => 'Asia',
  3 => 'Asia Pacific',
  4 => 'Caribbean',
  5 => 'Central America',
  6 => 'Europe',
  7 => 'Middle East/ North Africa',
  8 => 'North America',
  9 => 'Other',
  10 => 'South America',
];
const CATEGORY = [
  1 => 'Category',
  2 => 'Service'
];
const GENDER = [
  1 => 'Male',
  2 => 'Female'
];
function active_class($path)
{
  return (Route::getCurrentRoute()->uri == $path) ? 'active' : '';
}

function is_active_route($path)
{
  //dd(Route::getCurrentRoute()->uri);
  return (str_contains(Route::getCurrentRoute()->uri, $path)) ? 'true' : 'false';
}

function show_class($path)
{
  return (str_contains(Route::getCurrentRoute()->uri, $path)) ? 'show' : '';
}
function rolecheck($id)
{
  $roles = ['bg-info', 'bg-danger', 'bg-warning', 'bg-info', 'bg-primary'];
  return $roles[$id];
}
function breadcrumb()
{
  if (Route::getCurrentRoute()->uri == 'admin/dashboard') {
    $url = 'Home';
  } else {
    $n = explode('/', Route::getCurrentRoute()->uri);

    if (count($n) == 2) {
      $url = "Show " . ucfirst(Str::headline(ucfirst($n[1])));
    } elseif (count($n) == 3) {
      $url = ucfirst($n[2]) . " " . ucfirst(Str::headline(ucfirst($n[1])));
    } else {
      if ($n[2] === 'admin') {
        $url = ucfirst($n[1]) . " " . ucfirst(Str::headline(ucfirst($n[2])));
      } else {
        $url = ucfirst($n[3]) . " " . ucfirst(Str::headline(ucfirst($n[1])));
      }
    }
  }

  return  $url;
}



<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
 

function active_class($path) {
  return  (Route::getCurrentRoute()->uri== $path) ? 'active' : '';
}

function is_active_route($path) {
  //dd(Route::getCurrentRoute()->uri);
  return (str_contains(Route::getCurrentRoute()->uri,$path)) ? 'true' : 'false';
}

function show_class($path) {
  return (str_contains(Route::getCurrentRoute()->uri, $path)) ? 'show' : '';
}
function rolecheck($id)
{
  $roles=['bg-info', 'bg-danger','bg-warning','bg-info', 'bg-primary'];
return $roles[$id];
}
function breadcrumb()
{
  if(Route::getCurrentRoute()->uri== 'admin/dashboard')
  {
$url='Home';
  }else
  {
  $n=explode('/', Route::getCurrentRoute()->uri);
 
  if(count($n)==2)
  {
      $url = "Show " . ucfirst(Str::headline(ucfirst($n[1])));
  } elseif (count($n) == 3)
  {
      $url = ucfirst($n[2]) ." " . ucfirst(Str::headline(ucfirst($n[1])));
  }else{
      $url = ucfirst($n[3]) . " " . ucfirst(Str::headline(ucfirst($n[1])));
  }
  
  }

  return  $url;
  
}




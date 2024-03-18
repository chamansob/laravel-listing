<?php

use App\Http\Controllers\Backend\CoachController;
use App\Models\Categories;
use App\Models\Coach;
use App\Models\Languages;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'home');

Route::get('/test', function () {
  //      $coach =Coach::find(1);
  //  $co= $coach->languages()->pluck('name')->toArray();
  //   $m=implode(",",$co);
  //   echo $m;
  // $cats=Categories::whereIn('id', [1])->get();
  // // dd($cat);
  // foreach($cats as $cat)
  // {
  //     $cat->filterables()->attach($coach);
  // $cat->filterables()->detach($coach);
  // }
  // foreach ($coach->categories as $cat) {
  //     echo $cat->name;
  // }
  //  foreach($cats as $cat)
  // {
  //     $cat->filterables()->syncWithoutDetaching($coach);
  // }
  // $coach->categories()->sync($cats);
  //  $p1 = Languages::whereIn('id',['22','24'])->get();

  //  return view('test',compact('p1'));
  return view('test');
});
require __DIR__ . '/user.php';

require __DIR__ . '/admin.php';



require __DIR__ . '/auth.php';
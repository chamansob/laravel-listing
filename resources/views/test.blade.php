<?php
//$x=App\Models\Languages::whereIn('id',['22','24'])->get();
//dd($x);
$x=\App\Models\User::where('role', 'user')->join('coaches', 'coaches.user_id', '!=', 'users.id')
            ->inRandomOrder()->first();

            dd($x);
?>
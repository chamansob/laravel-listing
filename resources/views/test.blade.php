<?php
$x=App\Models\Languages::whereIn('id',['22','24'])->get();
dd($x);
?>
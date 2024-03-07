<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counters = Counter::all();
        return view('backend.counter.all_counter', compact('counters'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.counter.add_counter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:counters|max:200',
        ]);


        Counter::insert([
            'icon' => $request->icon,
            'name' => $request->name,
            'sign' => $request->sign,
            'number' => $request->number,
           

        ]);
        $notification = array(
            'message' => 'Held Position ThemeAdded Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counter $counter)
    {
        return view('backend.counter.edit_counter', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Counter $counter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counter $counter)
    {
        //
    }
}

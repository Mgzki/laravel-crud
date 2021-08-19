<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard', 
        // [
        //     // 'item' => Item::with('author')->orderByDesc('created_at')->get()
        // ]);
        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'content' => 'required'
        ]);


        $item = Item::create([
            'list_id' => request('list'),
            'content' => request('content'),
            'completed' => 0,
        ]);
        

        $uri = '/dashboard/' . $item->list->slug;
        return redirect($uri . '/edit')->withSuccess('List created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return redirect('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

            return redirect('/dashboard/' . $item->list->slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        request()->validate([
            'completed' => ['nullable'],
        ]);

        $item->update([
            'completed' => (bool) $request->completed
        ]);

        return redirect('/dashboard/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/dashboard/' . $item->list->slug . '/edit');
    }
}

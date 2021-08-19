<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\TodoList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::guest()) {
            return view('lists.dashboard', [
                'lists' => Auth::user()->lists()->orderByDesc('created_at')->get()
            ]);
        } else {
            return redirect('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin-only', Auth::user())){
            return view('lists.create',[
                'categories' => Category::all()
            ]);
        } else {
            abort(403);
        }
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
            'name' => 'required',
            'category' => 'required',
        ]);
        

        $list = TodoList::create([
            'name' => ucwords(request('name')),
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('name')))),
            'user_id' => Auth::user()->id,
            // 'category_id' => request('category'),
            'category_id' => 1,
        ]);

        $uri = '/dashboard/' . $list->slug;
        return redirect($uri . '/edit')->withSuccess('List created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    // public function show(TodoList $todoList)
    // {
    //     return view('show', ['list' => $todoList] );
    // }
    public function show(Item $items, TodoList $todoList)
    {
        if (Gate::allows('list-author', $todoList)){
            return view('lists.show', [
                'items' => $todoList->items,
                'list' => $todoList
            ]);
        } else {
            abort(403);
        }

        // abort_if(! Gate::allows('list-author', $todoList), 403);

        // return view('show', [
        //     'items' => $todoList->items,
        //     'list' => $todoList
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $items, TodoList $todoList)
    {
        if (Gate::allows('list-author', $todoList)){
            return view('lists.edit', [
                'items' => $todoList->items,
                'list' => $todoList
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList)
    {   
        request()->validate([
            'name' => 'required',
        ]);

        $todoList->update([
            'name' => request('name'),
        ]);

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        $todoList->delete();
        return redirect('/dashboard');
    }
}

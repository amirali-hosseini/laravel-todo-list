<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::query()->where('user_id', auth()->id())->get();
        $undones = Todo::query()->where('user_id', auth()->id())->where('status', 0)->get();
        $dones = Todo::query()->where('user_id', auth()->id())->where('status', 1)->get();

        return view('index', compact('todos', 'dones', 'undones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $validated = $request->validated();

        Todo::query()->create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'status' => $validated['status'],
        ]);

        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->user_id == auth()->id()) {
            $todo->delete();
        }

        return back();
    }

    /**
     * Switch the specified status resource from storage.
     */
    public function switch(Todo $todo)
    {
        if ($todo->user_id == auth()->id()) {
            $todo->update([
                'status' => !$todo->status
            ]);
        }

        return back();
    }
}

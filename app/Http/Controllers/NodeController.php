<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Node::query()->orderBy('created_at', 'desc')->paginate();

        return view('note.index', compact('notes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated_data = $request->validate([
            'note' => "required|string|max:200",
            'user_id' => "nullable|exists:users,id"

        ]);

        $validated_data['user_id'] = 1;
        $note = Node::create($validated_data);
        return to_route('note.show', $note)->with('success', 'Note added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Node $note)
    {
        return view('note.show',  ['note'=> $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Node $note)
    {
        return view('note.edit', ['note'=> $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Node $note)
    {
        $validated_data = $request->validate([
            'note' => "required|string|max:200",
        ]);

        $note->update($validated_data);
        return to_route('note.show', $note)->with('success', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Node $note)
    {
        $note->delete();
        return to_route('note.index')->with('success','Note deleted successfully');
    }
}

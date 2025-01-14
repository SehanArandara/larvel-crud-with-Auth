<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id',request()->user()->id)
            ->orderBy('created_at','desc')
            ->paginate();
        // dd($notes);
        return view('note.index',[
            'notes'=>$notes
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('note.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note'=>['required']
        ]);

        $data['user_id'] = $request->user()->id;
        $note = Note::create($data);

        return redirect(route('note.index'))->with('success',"note is added");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Note $note)
    {
        
        return view('note.show',['note'=>$note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Note $note)
    {
        return view('note.edit',['note'=>$note]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'note'=>['required']
        ]);

        $data['user_id'] = $request->user()->id;
        $note->update($data);

        
        return redirect(route('note.index'))->with('success',"note is updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect(route('note.index'))->with('success',"note is deleted");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;
use App\Question;
use Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $notes = Auth::user()->notes;
        return view('notes.notes')->with('notes',$notes);
    }

    public function create(Request $request){
        $note = new Notes;
        $note->title = $request->title;
        $note->body = $request->body;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->back();
    }

    public function delete($id){
        $note = Notes::find($id);
        $note->delete();

        return redirect()->back();
    }


    public function update($id){
        $note = Notes::find($id);

        return view('notes.update')->with('note',$note);
    }

    public function save(Request $request,$id){
        $note = Notes::find($id);
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        return redirect()->route('notes');
    }

    public function savefromquestion($id){
        $question = Question::find($id);

        $note = new Notes;
        $note->title = $question->title;
        $note->body = $question->answers->sortByDesc('votes_count')[0]->body;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->back();
    }
}

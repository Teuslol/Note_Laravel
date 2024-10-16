<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\TryCatch;

class MainController extends Controller
{
    public function index(){

        $id = session('user.id');
        $user = User::find($id)->toArray();
        $notes = User::find($id)->notes()->whereNull('deleted_at')->get()->toArray();

        return view('home',['notes' => $notes, 'user' => $user]);
    }

    public function newNote(){
        // show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request){
        // validate request
        $request->validate(
            [
                'text_title'=> 'required|min: 3|max:200',
                'text_note'=>  'required|min: 3|max: 3000'
            ],
            // error messages
            [
                'text_title.required'=>'Título Obrigatório!',
                'text_title.min'=>'O título deve conter no Minimo: :min caracteres',
                'text_title.max'=>'O título deve conter no Miximo: :min caracteres',
                'text_note.required'=>'Nota Obrigatória!',
                'text_note.min'=>'A nota deve conter no Minimo: :min caracteres',
                'text_note.max'=>'A nota deve conter no Minimo: :min caracteres'
            ]
    );

        // get user id
        $id = session('user.id');
        //create new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();
        // redirect to home
        return redirect()->route('home');
    }

    public function editNote($id){
        $id = Operations::decryptId($id);
        // load note
        $note = Note::find($id);
        // show edit submit
        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request){
        // validate request
        $request->validate(
            [
                'text_title'=> 'required|min: 3|max:200',
                'text_note'=>  'required|min: 3|max: 3000'
            ],
            // error messages
            [
                'text_title.required'=>'Título Obrigatório!',
                'text_title.min'=>'O título deve conter no Minimo: :min caracteres',
                'text_title.max'=>'O título deve conter no Miximo: :min caracteres',
                'text_note.required'=>'Nota Obrigatória!',
                'text_note.min'=>'A nota deve conter no Minimo: :min caracteres',
                'text_note.max'=>'A nota deve conter no Minimo: :min caracteres'
            ]
        );
        // aula 68
        if($request->note_id == null){

            return redirect()->route('home');
            /* para teste
            echo print($request->note_id);
            $id = Operations::decryptId($request->note_id);
            $note = Note::find($id);
            dd($id); // Verifique se o ID decifrado está correto
            dd($note); // Verifique se a nota foi encontrada
            die('    |');
            */
        }

        //id da sessão
        $id = Operations::decryptId($request->note_id);
        $note = Note::find($id);
        //update note
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        return redirect()->route('home');
    }

    public function deleteNote($id){
        $id = Operations::decryptId($id);
        //load note
        $note = Note::find($id);
        return view('delete_note',['note' => $note]);
    }
    public function deleteNoteConfirm($id){
        // check if id is encrypted
        $id = Operations::decryptId($id);
        // load note
        $note = Note::find($id);
        // 1. hard delete
        //$note->delete();
        //$note->forceDelete();

        // 2. soft delete
        // $note->deleted_at = date('Y:m:d H:i:s');
        //$note->save();

        //3. soft delete pelo model
        $note->delete();
        return redirect()->route('home');
    }
}

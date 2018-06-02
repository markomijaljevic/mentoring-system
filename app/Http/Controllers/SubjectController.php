<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use League\Flysystem\FileExistsException;
use Mockery\Exception;

;

class SubjectController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }


    function getAddNewSubject(){

        return view('subjects.dodaj_novi_predmet');

    }


    function getSubject(){

        $predmeti=\App\Subject::all();

        return view('subjects.predmeti')->with('predmet',$predmeti);

    }

  /*  protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'code' => 'required',
            'ects' => 'required',
            'electivecourse' => 'required',
            'program' => 'required',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {

        $subject = new \App\Subject();

        if ($request->isMethod(Request::METHOD_POST)) {

          /*  $this->validate($request, [
                'name' => 'required',
                'code' => 'required',
                'ects' => 'required',
                'electivecourse' => 'required',
                'program' => 'required',
            ]);*/

            $subject->name = e($request->input('name'));
            $subject->code = e($request->input('code'));
            $subject->ects = e($request->input('ects'));
            $subject->sem_redovni = e($request->input('sem_redovni'));
            $subject->sem_izvanredni = e($request->input('sem_izvanredni'));
            $subject->electivecourse = e($request->input('electivecourse'));

           // $subject->updated_at = e($request->input('NULL'));
           // $subject->created_at = e($request->input('NULL'));

            $subject->program = e($request->input('program'));

            $subject->save();
        }

        $request->session()->flash('success', 'KOLEGIJ JE USPIJEŠNO POHRANJEN');

        return redirect('/predmeti');
    }

    protected function delete($id){

        try {
            if (isset($id)) {
                $subject = \App\Subject::find($id);
                $subject->delete();
                session()->flash('success', 'KOLEGIJ JE USPIJEŠNO IZBRISAN');

                return redirect('/predmeti');

            }
        }
        catch (\Illuminate\Database\QueryException $e){
            session()->flash('danger', 'KOLEGIJ NIJE MOGUĆE IZBRISATI JER SU NEKI STUDENTI UPISANI');

            return redirect('/predmeti');
        }
    }

    public function getEdit($id){

        $subject=\App\Subject::find($id);
        return view('subjects.dodaj_novi_predmet')->withSubject($subject);

    }

    public function edit(Request $request,$id){

        $subject=\App\Subject::findOrFail($id);
       ;

        if ($request->isMethod(Request::METHOD_POST)) {
            $subject->name = e($request->input('name'));
            $subject->code = e($request->input('code'));
            $subject->ects = e($request->input('ects'));
            $subject->sem_redovni = e($request->input('sem_redovni'));
            $subject->sem_izvanredni = e($request->input('sem_izvanredni'));
            //$subject->electivecourse = e($request->input('electivecourse'));
            $subject->program = e($request->input('program'));

            $subject->save();
        }
        $request->session()->flash('success', 'KOLEGIJ JE USPIJEŠNO UREĐEN');

        return redirect('/predmeti');

    }

    public function upisi($id){

       /* $student = Auth::user();
        $predmet=\App\Subject::findOrFail($id);*/

        try {
            $upisi = new \App\Entrie();
            $upisi->student_id = Auth::user()->id;
            $upisi->predmet_id = $id;
            //$upisi->status = Auth::user()->status;

          /*  $student->ukupanUpisanihECTS =  $student->ukupanUpisanihECTS + $predmet->ects;
            $student->save();*/
            $upisi->save();
            session()->flash('success', 'KOLEGIJ JE USPIJEŠNO UPISAN');



        }
        catch (\Illuminate\Database\QueryException $e){


            session()->flash('danger', 'KOLEGIJ JE VEĆ UPISAN');

        }

        $predmeti = \App\Subject::all();
        return view("subjects.predmeti")->withPredmet($predmeti);

    }


}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function izvjestaj(){

        $students=User::all();
        $upisanPred=\App\Entrie::all();
        $predmeti=\App\Subject::all();

        return view('student.isvjestaj')->withStudents($students)->withUpisan($upisanPred)->withPredmet($predmeti);
    }


    public function countEcts(Request $request,$id){

        $student=\App\Student::findOrFail($id);
        $predmet=\App\Subject::findOrFail($id);

        $student->ukupanUpisanihECTS =  $student->ukupanUpisanihECTS + $predmet->ects;

        if ($request->isMethod(Request::METHOD_POST)) {

            $student->ukupanUpisanihECTS = e($request->input('ukupanUpisanihECTS'));

            $student->save();
        }


        return redirect('/predmeti');

    }


    public function getHome(){
        return view('home');
    }

    public function getAddNewStudent(){
        return view('student.dodaj_novog_studenta');
    }

    public function getStudent(){

        $students=User::all();
        $upisanPred=\App\Entrie::all();
        $predmeti=\App\Subject::all();

        return view('student.student')->withStudents($students)->withUpisan($upisanPred)->withPredmet($predmeti);
    }

    protected function delete($id){
        try {
            $student = \App\User::findOrFail($id);
            $student->delete();

            session()->flash('success', 'STUDENT USPIJEŠNO IZBRISAN');

            return redirect('/studenti');
        }
        catch (\Illuminate\Database\QueryException $e){

            session()->flash('danger', 'NIJE MOGUĆE IZBRISATI STUDENTA , JOŠ STUDIRA ;)');
            return redirect('/studenti');
        }

    }

    public function getProfile(){

        $upisanPred=\App\Entrie::all();
        $predmeti=\App\Subject::all();

        return view('student.profil')->withUpisan($upisanPred)->withPredmet($predmeti);

    }

    public function remove($id){

        $upisaniPredmeti=\App\Entrie::where('student_id','=',Auth::user()->id)->where('predmet_id','=',$id);
        $upisaniPredmeti->delete();
        return redirect('/profile');

    }

    public function ispisi($id,$sid){

        $upisi = \App\Entrie::where('student_id','=',$sid)->where('predmet_id','=',$id);
        $upisi->delete();

        return redirect("/studenti");

    }




    public function passed($id){

        $student = Auth::user();
        $predmet=\App\Subject::findOrFail($id);
        $upisi = \App\Entrie::where('student_id',$student->getAuthIdentifier())->where('predmet_id',$id);



        try {

            $student->ukupanUpisanihECTS =  $student->ukupanUpisanihECTS + $predmet->ects;

            $upisi->status = 1;
            $upisi->save();
            $student->save();

            session()->flash('success', 'ČESTITAMO NA POLOŽENOM PREDMETU');


        }
        catch (\Illuminate\Database\QueryException $e){

           dump($e);
            session()->flash('danger', 'VEĆ STE POLOŽILI');

        }

            return redirect('/profile');

    }

}
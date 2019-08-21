<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

//php

class CvController extends Controller
{
  public function createcv(){
      
    return view('create');
  }
  public function store(Request $request){

    $request->validate =[
       'fullname' => 'required|regex:^[a-zA-Z\s]*$^',
       'email' => 'required|email',
       'cv' => 'required|file|mimes:doc,docx',     
    ];
        $files = $request->file('cv');
        $request->cv->storeAs('cv', $request->cv->getClientOriginalName());
        $filename = $request->cv->getClientOriginalName().'.'.$files->getClientOriginalExtension();
      $data = Cv::create([  
        'fullname' => $request['fullname'],
        'email' => $request['email'],
        'job' => $request['job'],
        'cv' =>  storage_path('app\public\cv'.'/'.$filename),
      ]);
      return redirect('/');
    }

    

  
  public function show($id)
  {
      $cv = Cv::find($id);

      return view('show', compact('cv'));//
  }
  public function index(){
       
    $cv = DB::table('cvs')
                ->orderBy('created_at', 'desc')
                ->paginate(5)
  ;

    return view('index', compact('cv'));

  }
  public function filter(Request $request){

    $cv = DB::table('cvs')->where('job', '=', $request->input('job'))->orderBy('created_at', 'desc')->paginate($request['paging']);

    return view('index', compact('cv'));    

  }
}

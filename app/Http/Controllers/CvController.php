<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CvController extends Controller
{
  public function createcv(){
      
    return view('create');
  }
  public function store(Request $request){

    $request->validate =[
       'fullname' => 'required|regex:^[a-zA-Z\s]*$^',
       'email' => 'required',
       'cv' => 'required|file|mimes:doc,docx',     
    ];
    if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
        return redirect('/create')->with('error', 'Netinkamai įvestas el. pašto adresas');
    }else{
        $files = $request->file('cv');
        $request->cv->storeAs('cv', $request->cv->getClientOriginalName());
        $filename = $request->cv->getClientOriginalName().$files->getClientOriginalExtension();
      $data = Cv::create([  
        'fullname' => $request['fullname'],
        'email' => $request['email'],
        'job' => $request['job'],
        'cv' =>  storage_path('app\public\cv'.'/'.$filename),
      ]);
      return redirect('/');
    }

    

  }
  public function show($id)
  {
      $cv = Cv::find($id);

      return view('cv.show', compact('cv'));//
  }
  public function index(){
       
    $cv = DB::table('cvs')
                ->orderBy('created_at', 'desc')
                ->paginate(10);


    return view('index', compact('cv'));

  }
  public function filter(Request $request){
    if($request->input('jobs') != '')
        $query = Product::where('jobs', '=', $request->input('jobs'));
    $query->orederBy('created_at', 'desc')->paginate($request->input(['paging']));       
    $cv = $query->get();
    return view('index', compact('cv'));    



  }
}

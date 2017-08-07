<?php

namespace App\Http\Controllers;
use App\Movie as Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  public function store(Request $request)
  {
    $movie = new Movie;
    // $movie->name = request->name;
    // $movie->description = request->description;
    // $movie->save();
    $movie->create($request->all());
    return redirect('movie');

  }
  public function index(){
      $movies = Movie::all();
     return \View::make('list',compact('movies'));
   }
   public function create()
   {
    return \View::make('new');
    }

     public function edit($id)
  	{

   	 	$movie = Movie::find($id);
        echo "dsa $movie";

     return \View::make('update',compact('movie'));
  
   	}
  public function destroy($id)
  {
    echo "Esto muestra un producto. Recibiendo00 $id";
  return "Esto muestra un producto. Recibiendo $id";
  }


    //


    public function update(Request $request)
    	{
        echo "string $request";
                    $movie = Movie::find($request->id);
                    $movie->name = $request->name;
                    $movie->description = $request->description;
    		$movie->save();
                    return redirect('movie');
    	}

    public function search(Request $request){
         $movies = Movie::where('name','like','%'.$request->name.'%')->get();
         return \View::make('list', compact('movies'));

    }

}

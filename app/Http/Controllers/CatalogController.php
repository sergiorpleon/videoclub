<?php

namespace App\Http\Controllers;

use App\Movie as Movie;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function getIndex()
    {
        $arrayPeliculas = Movie::all();
        return view('catalog.index', array('arrayPeliculas'=>$arrayPeliculas));
    }
    
    public function getCreate(Request $request)
    {
        if($request->isMethod('post')){
           if( $this->validate($request, [
                'title' => 'required',
                'year' => 'required',
                'director' => 'required',
            ]))
            {
                $movie = new Movie;
                $movie->title = $request->input('title');
                $movie->year = $request->input('year');
                $movie->director = $request->input('director');
                if ($request->file('photo')!=null)
                {
                    if ($request->file('photo')->isValid())
                {
                    
                    $name = $request->file('photo')->getClientOriginalName();
                    
                    $request->file('photo')->move($_SERVER['DOCUMENT_ROOT'].'/videoclub/public/assets/photo/',$name);
                    $movie->poster = url('assets/photo').'/'.$name;
                }
                }
                #$movie->poster = $request->input('poster');
                $movie->rented = ($request->input('rented')==1)?true:false;
                $movie->synopsis = $request->input('synopsis');
                $movie->save();
                $insertedId = $movie->id;
                return redirect()->action('CatalogController@getShow',[$insertedId]);
            }
            return redirect('catalog/create/post')->withInput();
        }else{
            return view('catalog.create');
        }
    }
    
    public function getShow($id)
    {
        $pelicula = Movie::find($id);
        return view('catalog.show', array('pelicula'=>$pelicula, 'key'=>$id));
    }
    
    public function putEdit(Request $request, $id)
    {
        if($request->isMethod('post')){
           if( $this->validate($request, [
                'title' => 'required',
                'year' => 'required',
                'director' => 'required',
            ]))
            {
                $movie = Movie::find($id);
                $movie->title = $request->input('title');
                $movie->year = $request->input('year');
                $movie->director = $request->input('director');
                if ($request->file('photo')!=null)
                {
                    if ($request->file('photo')->isValid())
                {
                    
                    $name = $request->file('photo')->getClientOriginalName();
                    $request->file('photo')->move($_SERVER['DOCUMENT_ROOT'].'/videoclub/public/assets/photo/',$name);
                    $movie->poster = url('assets/photo').'/'.$name;
                }
                }
                #$movie->poster = $request->input('poster');
                $movie->rented = ($request->input('rented')==1)?true:false;
                $movie->synopsis = $request->input('synopsis');
                $movie->save();
                $insertedId = $movie->id;
                return redirect()->action('CatalogController@getShow',[$insertedId]);
            }
            return redirect('catalog/edit/'.$id)->withInput();
        }else{
            $pelicula = Movie::find($id);
            return view('catalog.edit', array('pelicula'=>$pelicula));
        }
    }
    
    public function getReturn($id)
    {
        $pelicula = Movie::find($id);
        $pelicula->rented = ($pelicula->rented == 1)?false:true;
        return view('catalog.show', array('pelicula'=>$pelicula, 'key'=>$id));
    }
}

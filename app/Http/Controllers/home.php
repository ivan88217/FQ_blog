<?php

namespace App\Http\Controllers;

use App\indexModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class home extends Controller
{
    
    function index(){
        $All = DB::table('blog')->paginate(5);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }
    function index1($cls){
        $All = DB::table('blog')->where('class',$cls)->paginate(5);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }
    function manager(){
        $All = DB::table('blog')->paginate(10);
        return view('manager',['All' => $All]);
    }

    function search(Request $title){
        $All=DB::table('blog')->where('title','LIKE','%'.$title->title.'%')->paginate(10);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }

    function newA(){
        return view('newArticle');
    }

    public function insert(Request $req){
        DB::table('blog')->insert([
            'title' => $req->title,
            'class' =>  $req->class,
            'content' =>  $req->content,
        ]);
        return redirect()->action('home@manager');
    }

    function delete($id){
        DB::delete("DELETE FROM `blog` WHERE `blog`.`ID` =".$id);
        return redirect()->action('home@manager');
    }
    
    function edit(Request $req){
        DB::table('blog')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title
        ]);
        return back(); 
    }

    function deleteAll(Request $req){
        $delete_list = $req->input('deleteAll');
        DB::table('blog')->whereIn('ID', array_keys($delete_list))
        ->delete();
        return redirect()->action('home@manager');
    }
}
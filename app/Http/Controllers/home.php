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
        return view('index',['All' => $All]);
    }
    function manager(){
        $All = DB::table('blog')->paginate(10);
        return view('manager',['All' => $All]);
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
    function content($id){
        $All = DB::table('blog')->where('ID','=',$id)->paginate(10);
        return view('content',['All' => $All]);
    }
    function update(Request $req){
        DB::table('blog')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title,
            'content' =>  $req->content,
        ]);
        return back(); 
    }
    function edit(Request $req){
        DB::table('blog')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title
        ]);
        return back(); 
    }
}
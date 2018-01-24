<?php

namespace App\Http\Controllers;

use App\indexModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class home extends Controller
{
    //首頁
    function index(){
        $All = DB::table('blog')->paginate(5);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }

    //類別
    function index1($cls){
        $All = DB::table('blog')->where('class',$cls)->paginate(5);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }

    //搜尋
    function search(Request $title){
        $All=DB::table('blog')->where('title','LIKE','%'.$title->title.'%')->paginate(10);
        $gt=DB::table('blog')->get();
        return view('index',['All' => $All,'gt' =>$gt]);
    }

    //後台
    function manager(){
        $All = DB::table('blog')->paginate(10);
        return view('manager',['All' => $All]);
    }

    //新增文章
    function newA(){
        return view('newArticle');
    }

    //文章新增至DB
    public function insert(Request $req){
        DB::table('blog')->insert([
            'title' => $req->title,
            'class' =>  $req->class,
            'content' =>  $req->content,
        ]);
        return redirect()->action('home@manager');
    }

    //刪除文章
    function delete($id){
        DB::delete("DELETE FROM `blog` WHERE `blog`.`ID` =".$id);
        return redirect()->action('home@manager');
    }
    
    //編輯文章
    function edit(Request $req){
        DB::table('blog')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title
        ]);
        return back(); 
    }

    //選擇刪除
    function deleteAll(Request $req){
        $delete_list = $req->input('deleteAll');
        DB::table('blog')->whereIn('ID', array_keys($delete_list))
        ->delete();
        return redirect()->action('home@manager');
    }
}
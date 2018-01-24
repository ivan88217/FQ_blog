<?php

namespace App\Http\Controllers;

use App\indexModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class content extends Controller
{
    //回復文章
    function content($id){
        $All = DB::table('blog')->where('ID','=',$id)->paginate(10);
        $cont =DB::table('content')->where('blogID','=',$id)->paginate(10);
        return view('content',['All' => $All,'cont' =>$cont]);
    }

    //新增回復
    function update(Request $req){
        DB::table('content')->insert([
            'blogID'=>$req->ID,
            'title' => $req->title,
            'content' =>  $req->content,
        ]);
        return back(); 
    }

    //文章詳情
    function indexcontent($id){
        $All = DB::table('blog')->where('ID','=',$id)->paginate(10);
        $cont =DB::table('content')->where('blogID','=',$id)->paginate(10);
        $gt=DB::table('blog')->get();
        return view('indexcontent',['All' => $All,'cont' =>$cont,'gt' => $gt]);
    }

    //刪除回文
    function contdelete($id){
        DB::delete("DELETE FROM `content` WHERE `content`.`ID` =".$id);
        return back();
    }
    
    //回文編輯
    function contedit(Request $req){
        DB::table('content')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title,
            'content'=>$req->content
        ]);
        return back(); 
    }
}

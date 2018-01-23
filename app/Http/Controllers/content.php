<?php

namespace App\Http\Controllers;

use App\indexModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class content extends Controller
{
    function content($id){
        $All = DB::table('blog')->where('ID','=',$id)->paginate(10);
        $cont =DB::table('content')->where('blogID','=',$id)->paginate(10);
        return view('content',['All' => $All,'cont' =>$cont]);
    }

    function update(Request $req){
        DB::table('content')->insert([
            'blogID'=>$req->ID,
            'title' => $req->title,
            'content' =>  $req->content,
        ]);
        return back(); 
    }

    function indexcontent($id){
        $All = DB::table('blog')->where('ID','=',$id)->paginate(10);
        $cont =DB::table('content')->where('blogID','=',$id)->paginate(10);
        $gt=DB::table('blog')->get();
        return view('indexcontent',['All' => $All,'cont' =>$cont,'gt' => $gt]);
    }

    function contdelete($id){
        DB::delete("DELETE FROM `content` WHERE `content`.`ID` =".$id);
        return back();
    }
    
    function contedit(Request $req){
        DB::table('content')->where('ID','=',$req->ID)
        ->update([
            'title' => $req->title,
            'content'=>$req->content
        ]);
        return back(); 
    }
}

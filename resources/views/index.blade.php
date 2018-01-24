@extends('template')
@section('content')

<style>
    @import url(/blog/css/index.css);
</style>
<div class="title">
    Blogger Banner 1000 x 100
</div>
<div class="leftDIV">
    <form class="form-group" action="search" method="post">
            {{ csrf_field() }}
      <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="請輸入關鍵字" style="float:left;width:80%"/>
      <button type="submit"  id="" class="btn btn-primary" role="button" style="width:15%;line-height:3.5vh;text-align:center;text-indent:0">搜尋</button>
      <hr style="width:100%">
    </form>
    
    @foreach($All as $each)
        <div class="content" onclick="location='/blog/indexcontent/{{$each->ID}}'">
            <div class="text1 btn-primary">{{$each->title}}</div>
            <div class="text2"> 發布時間:{{$each->created_at}} </div>
            <div class="cla">類別:{{$each->class}}</div>
            <div class="text3">{{$each->content}}</div>
            <hr/>
        </div>
    @endforeach
    <hr style="width:100%;margin-bottom:5vh;bottom:0"/>
</div>
<div class="rightDIV">
    <div class="clas">
        <div class="rightTitle">文章分類</div>
        <div class="rightContent">
            @foreach(["C", "C++", "PHP", "JAVA", "C#"] as $lang)
            <a name="" id=""  href="{{asset('index/'.$lang)}}" role="button" class="txt btn btn-primary" style="color:black">
                {{$lang}}
            </a>
            @endforeach
        </div>
    </div>
    <div class="new">
        <div class="rightTitle">最新文章</div>
        <div class="rightContent">
            @if(count($gt)>0)
            @for($i = count($gt)-1 ; $i>count($gt)-6 ; $i--)
            <?php 
            $hrf=$gt[$i]->ID;
            ?>
            <a name="" id=""  href="{{asset('indexcontent/'.$hrf)}}" role="button" class="txt btn btn-primary" style="color:black">
                {{$gt[$i]->title}}
            </a>
            @endfor
            @endif
        </div>
    </div>
    
</div>

<nav aria-label="Page navigation" class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
        <span class="pa"><?php echo $All->render(); ?></span>
</nav>
<script>
    $(".pagination li").addClass("page-item");
    $(".pagination a, .pagination span").addClass("page-link");
    $(".pagination").addClass("pagination-sm");
</script>

@stop
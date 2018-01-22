@extends('template')
@section('content')

<style>
    @import url(css/index.css);
</style>
<div class="title">
    Blogger Banner 1000 x 100
</div>
<div class="leftDIV">
    <div class="form-group">
      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="請輸入關鍵字" style="float:left;width:80%"/>
      <a name="" id="" class="btn btn-primary" href="#" role="button" style="width:15%;line-height:3.5vh;text-align:center;text-indent:0">搜尋</a>
      <hr style="width:100%">
    </div>
    
    @foreach($All as $each)
        <div class="content">
            <div class="text1">{{$each->title}}</div>
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
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
        </div>
    </div>
    <div class="new">
        <div class="rightTitle">最新文章</div>
        <div class="rightContent">
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
            <div class="txt">JAVA</div>
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
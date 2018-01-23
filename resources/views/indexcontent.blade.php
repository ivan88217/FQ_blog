@extends('template') @section('content')

<style>
    @import url(/blog/css/index.css);
</style>
<div class="title">
    Blogger Banner 1000 x 100
</div>
<div class="leftDIV">
    <div class="form-group">
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="請輸入關鍵字" style="float:left;width:80%"
        />
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
    <hr style="width:100%;margin-bottom:5vh;bottom:0" /> @foreach($cont as $each)
    <div class="content">
        <div class="text1">{{$each->title}}</div>
        <div class="text2"> 發布時間:{{$each->created_at}} </div>
        <div class="cla">&nbsp;</div>
        <div class="text3">{{$each->content}}</div>
        <hr/>
    </div>
    @endforeach
    <form class="form-group" style="margin-bottom:5vh;" action="{{asset('update')}}" method="post">
        {{ csrf_field() }}
        <label for="">回覆：</label>
        @foreach($All as $each)
        <input type="hidden" value="{{$each->ID}}" name="ID"> @endforeach
        <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="標題">
        <small id="helpId" class="form-text text-muted">&nbsp;</small>
        <textarea name="content" id="" rows="5" class="form-control" placeholder="內容" style="resize:none;"></textarea>
        <small id="helpId" class="form-text text-muted"></small>
        <button type="submit" class="btn btn-primary" name="btn" style="float:right">送出</button>
    </form>
    <hr style="width:100%;float:right">
    <hr style="width:100%;float:right">
</div>
<div class="rightDIV">
    <div class="clas">
        <div class="rightTitle">文章分類</div>
        <div class="rightContent">
            @foreach(["C", "C++", "PHP", "JAVA", "C#"] as $lang)
            <a name="" id="" href="#" role="button" class="txt btn btn-primary" style="color:black">{{$lang}}</a>
            @endforeach
        </div>
    </div>
    <div class="new">
        <div class="rightTitle">最新文章</div>
        <div class="rightContent">
            @if(count($gt)>0) @for($i = count($gt)-1 ; $i>count($gt)-6 ; $i--)
            <?php 
                $hrf=$gt[$i]->ID;
                ?>
            <a name="" id="" href="{{asset('indexcontent/'.$hrf)}}" role="button" class="txt btn btn-primary" style="color:black">
                {{$gt[$i]->title}}
            </a>
            @endfor @endif
        </div>
    </div>

</div>

<nav aria-label="Page navigation" class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
    <span class="pa">
        <?php echo $All->render(); ?>
    </span>
</nav>
<script>
    $(".pagination li").addClass("page-item");
    $(".pagination a, .pagination span").addClass("page-link");
    $(".pagination").addClass("pagination-sm");
</script> @stop
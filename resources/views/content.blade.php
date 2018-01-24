@extends('template') @section('content')

<style>
    @import url(/blog/css/manager.css);
</style>
<div class="container">

    <table class="table table-bordered" id="tbl" style="margin-top:9vh;">
        <thead class="thead-inverse">
            <tr>
                <th class="past">發布時間</th>
                <th class="response">回應時間</th>
                <th class="tit">標題</th>
                <th class="contt">內容</th>
            </tr>
        </thead>
        <tbody>
            @foreach($All as $each)
            
            <tr class="tr">
                <td>
                    {{$each->created_at}}
                </td>
                <td>
                    {{$each->updated_at}}
                </td>
                <td>
                    {{$each->title}}
                </td>
                <td>
                    {{$each->content}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{asset('contedit')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="ID">
        <table class="table table-bordered" id="tbl" style="margin-top:9vh;">
            <thead class="thead-inverse">
                <tr>
                    <th class="function">功能</th>
                    <th class="past">發布時間</th>
                    <th class="response">回應時間</th>
                    <th class="tit">標題</th>
                    <th class="contt">內容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cont as $each)
                <tr class="tr tr-content" data-id="{{$each->ID}}">
                    <td>
                        <button type="button" class="btn btn-primary" name="table_btn" data-method="edt">編</button>
                        <button type="button" class="btn btn-danger" name="table_btn" data-method="del">刪</button>
                    </td>
                    <td>
                        {{$each->created_at}}
                    </td>
                    <td>
                        {{$each->updated_at}}
                    </td>
                    <td >
                        <textarea name="title" style="border:none;width:100%;resize:none;background-color:white" disabled rows="5">{{$each->title}}</textarea>
                    </td>
                    <td>
                        <textarea name="content" style="border:none;width:100%;resize:none;background-color:white" disabled rows="5">{{$each->content}}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    <script>
        var form = $("form")[0];
        $(".tr-content .btn").click(function () {
            var id = this.parentNode.parentNode.getAttribute("data-id"),
                method = this.getAttribute("data-method"),
                textarea = $(`[data-id=${id}] textarea`)[0],
                textarea1 = $(`[data-id=${id}] textarea`)[1],
                edtBtn = $(`[data-id=${id}] [data-method=edt]`),
                delBtn = $(`[data-id=${id}] [data-method=del]`),
                savBtn = $(`[data-id=${id}] [data-method=sav]`),
                cnlBtn = $(`[data-id=${id}] [data-method=cnl]`);
            switch (method) {
                case "sav":
                    var idField = $("[name=ID]")[0];
                    idField.value = id;
                    savBtn.html("編").addClass("btn-primary").removeClass("btn-success").attr("data-method", "edt");
                    cnlBtn.html("刪").attr("data-method", "del");
                    form.submit();
                    textarea.disabled = true;
                    textarea1.disabled = true;
                    break;
                case "cnl":
                    textarea.disabled = true;
                    textarea1.disabled = true;
                    savBtn.html("編").addClass("btn-primary").removeClass("btn-success").attr("data-method", "edt");
                    cnlBtn.html("刪").attr("data-method", "del");
                    break;
                case "edt":
                    textarea.disabled = false;
                    textarea1.disabled = false;
                    edtBtn.html("存").addClass("btn-success").removeClass("btn-primary").attr("data-method", "sav");
                    delBtn.html("消").attr("data-method", "cnl");
                    break;
                case "del":
                    if (confirm('Confirm to delete?')) {
                        location = `/blog/contdelete/${id}`;
                    }
                    break;
            }
        });
    </script>
    <hr style="width:100%">
    <form class="form-group" style="margin-bottom:5vh;" action="{{asset('update')}}" method="post">
        {{ csrf_field() }}
        <label for="">回覆：</label>
        @foreach($All as $each)
        <input type="hidden" value="{{$each->ID}}" name="ID"> @endforeach
        <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="標題">
        <small id="helpId" class="form-text text-muted">&nbsp;</small>
        <textarea name="content" id="" rows="10" class="form-control" placeholder="內容" style="resize:none;"></textarea>
        <small id="helpId" class="form-text text-muted"></small>
        <button type="submit" class="btn btn-primary" name="btn" style="float:right">送出</button>
    </form>
    <hr style="width:100%">

    <script>
        function confirmDelete(btn) {
            if (confirm('Confirm to delete?')) {
                location = "delete/" + btn.getAttribute("data-id");
            }
        }
    </script>
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
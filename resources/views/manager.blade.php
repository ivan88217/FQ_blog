@extends('template') @section('content')

<style>
    @import url(/blog/css/manager.css);
</style>
<div class="container">
    <button type="button" class="btn btn-success" onclick="window.location='manager'">文章管理</button>
    <button type="button" class="btn btn-primary" onclick="window.location='newA'">新增文章</button>
    <form action="{{asset('edit')}}" method="post">
            {{ csrf_field() }}
    <table class="table">
        <thead class="lst">
            <tr>
                <th>文章列表</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr">
                <td scope="row">
                    <button type="button" class="btn btn-danger" name="btn" onclick="delAll()">勾選刪除</button>
                    <button type="button" class="btn btn-success" name="btn">文章置頂</button>
                </td>
            </tr>
        </tbody>
    </table>
    
            <input type="hidden" name="ID">
        <table class="table table-bordered" id="tbl">
            <thead class="thead-inverse">
                <tr>
                    <th class="switch">選</th>
                    <th class="function">功能</th>
                    <th class="past">發布時間</th>
                    <th class="response">回應時間</th>
                    <th class="class">類別</th>
                    <th class="title">標題</th>
                </tr>
            </thead>
            <tbody>
                    
                @foreach($All as $each)
                <tr class="tr tr-content" data-id="{{$each->ID}}">
                    <td scope="row">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="deleteAll[{{$each->ID}}]" id="" value="checkedValue" />
                            </label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" name="table_btn" data-method="edt">編</button>
                        <button type="button" class="btn btn-danger" name="table_btn" data-method="del">刪</button>
                        <button type="button" class="btn btn-success" name="table_cont" data-method="cnt">內容</button>
                    </td>
                    <td>
                        {{$each->created_at}}
                    </td>
                    <td>
                        {{$each->updated_at}}
                    </td>
                    <td>
                        {{$each->class}}
                    </td>
                    <td style="padding:0">
                        <textarea name="title" style="border:none;width:100%;resize:none;background-color:white" disabled rows="5">{{$each->title}}</textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    <script>
        var form = $("form")[0];
        function delAll(){
            form.action = "deleteAll";
            form.submit();
        }
        $(".tr-content .btn").click(function () {
            var id = this.parentNode.parentNode.getAttribute("data-id"),
                method = this.getAttribute("data-method"),
                textarea = $(`[data-id=${id}] textarea`)[0],
                edtBtn = $(`[data-id=${id}] [data-method=edt]`),
                delBtn = $(`[data-id=${id}] [data-method=del]`),
                cntBtn = $(`[data-id=${id}] [data-method=cnt]`),
                savBtn = $(`[data-id=${id}] [data-method=sav]`),
                cnlBtn = $(`[data-id=${id}] [data-method=cnl]`);
            switch (method) {
                case "sav":
                    var idField = $("[name=ID]")[0];
                    idField.value = id;
                    savBtn.html("編").addClass("btn-primary").removeClass("btn-success").attr("data-method", "edt");
                    cnlBtn.html("刪").attr("data-method", "del");
                    cntBtn.show();
                    form.submit();
                    textarea.disabled = true;
                    break;
                case "cnl":
                    textarea.disabled = true;
                    savBtn.html("編").addClass("btn-primary").removeClass("btn-success").attr("data-method", "edt");
                    cnlBtn.html("刪").attr("data-method", "del");
                    cntBtn.show();
                    break;
                case "edt":
                    textarea.disabled = false;
                    edtBtn.html("存").addClass("btn-success").removeClass("btn-primary").attr("data-method", "sav");
                    delBtn.html("消").attr("data-method", "cnl");
                    cntBtn.hide();
                    break;
                case "del":
                    if (confirm('Confirm to delete?')) {
                        location = `delete/${id}`;
                    }
                    break;
                case "cnt":
                    location = `content/${id}`;
                    break;
            }
        });
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
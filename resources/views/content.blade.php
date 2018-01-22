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
    <hr style="width:100%">
    <form class="form-group" style="margin-bottom:5vh;" action="{{asset('update')}}" method="post">
        {{ csrf_field() }}
        <label for="">回覆：</label>
        @foreach($All as $each)
        <input type="hidden" value="{{$each->ID}}" name="ID">
        @endforeach
        <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="標題">
        <small id="helpId" class="form-text text-muted">&nbsp;</small>
        <textarea name="content" id="" rows="10" class="form-control" placeholder="內容"></textarea>
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
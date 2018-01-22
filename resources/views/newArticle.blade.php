@extends('template') @section('content')

<style>
    @import url(css/manager.css);
</style>
<div class="container">
    <button type="button" class="btn btn-primary" onclick="window.location='manager'">文章管理</button>
    <button type="button" class="btn btn-success" onclick="window.location='newA'">新增文章</button>
    <form action="{{asset('insert')}}" method="post">
    {{ csrf_field() }}
        <table class="table">
            <thead class="lst">
                <tr>
                    <th colspan="2">新增文章</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">標題</td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">類別</td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="class" id="">
                                @foreach(["C", "C++", "PHP", "JAVA", "C#"] as $lang)
                                    <option>{{$lang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="" rows="10" style="resize:none" placeholder="內容"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-primary" name="btn" style="float:right;margin-right:7pt;" type="submit">
            Submit
        </button>
    </form>
</div>
@stop
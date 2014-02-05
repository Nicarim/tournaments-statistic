@extends('master')
@section('content')
<div class="container">
    <h1>Add new match</h1>
    <div class="input-group">
        <form role="form" name="input" method="post">
            <div class="form-group">
                <label for="chart-name">Match ids (comma separated):</label>
                <input type="text" class="form-control" id="chart-name" name="matches" placeholder="123,456 etc.">
            </div>
            <div class="form-group">
                <label for="beatmaps">Password:</label>
                <input type="text" class="form-control" id="beatmaps" name="password" placeholder="You think i'm going to give you a hint?">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>
@stop
@extends('master')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>Pick</th>
                <th>Name</th>
                <th>Playcount</th>
            </tr>
            @foreach ($beatmaps as $beatmap)
            <tr>
                <td>{{$beatmap->picktype}}</td>
                <td><a href="https://osu.ppy.sh/b/{{$beatmap_id}}">{{$beatmap->artist." - ".$beatmap->title." [".$beatmap->diff."]"}}</a></td>
                <td>{{$beatmap->played}}</td>
            </tr>
            @endforeach
        </table>
        <form role="form" name="input" method="post">
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="You think i'm going to give you a hint?">
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Refresh stats (may take a while)</button>
            </div>
        </form>
    </div>
@stop
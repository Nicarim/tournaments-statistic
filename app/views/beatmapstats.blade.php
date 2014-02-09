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
                <td><a href="https://osu.ppy.sh/b/{{$beatmap->beatmap_id}}">{{$beatmap->artist." - ".$beatmap->title." [".$beatmap->diff."]"}}</a></td>
                <td>{{$beatmap->played}}</td>
            </tr>
            @endforeach
        </table>

    </div>
@stop
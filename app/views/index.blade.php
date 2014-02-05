@extends('master')

@section('content')
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container" style="width:100%">
        <ul class="nav navbar-nav text-center" style="width:100%">
            @foreach ($groups as $key => $group)
            <li style="width:25%"><a href="#g{{substr($group->name, -1)}}"</a>{{$group->name}}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
@foreach ($groups as $key => $group)
<div id="g{{substr($group->name, -1)}}" class="jumbotron {{strtolower(substr($group->name, -1))}}" style="height: 100%;">
    <div class="container">
        <h2>{{$group->name}}</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr class="{{strtolower(substr($group->name, -1))}} header">
                <th>Team</th>
                <th>Played Matches</th>
                <th>Matches Won</th>
                <th>Maps Won</th>
                <th>Matches Lost</th>
                <th>Maps Lost</th>
                <th>SDR</th>
            </tr>
            @foreach ($group->teams as $j => $team)
                @if ($team->group == 0)
                    @if ($j <= 3)
                    <tr class="pass">
                        <td>{{$team->team_name}}</td>
                        <td>{{$team->played}}</td>
                        <td>{{$team->mw}}</td>
                        <td>{{$team->ml}}</td>
                        <td>{{$team->gw}}</td>
                        <td>{{$team->gl}}</td>
                        <td>{{$team->sdr}}</td>
                    </tr>
                    @else
                        <tr class="drop">
                            <td>{{$team->team_name}}</td>
                            <td>{{$team->played}}</td>
                            <td>{{$team->mw}}</td>
                            <td>{{$team->ml}}</td>
                            <td>{{$team->gw}}</td>
                            <td>{{$team->gl}}</td>
                            <td>{{$team->sdr}}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </table>
        <div class="container text-center small">
            <p>Match history:</p>
        </div>
        <div class="container small" style="width:40%; background-color: #d0d0d0">
            <small>
                <ul class="list-unstyled" style="padding:-10px;">
                    <li>A vs B - A won SDR +2,05 for winner</li>
                    <li>A vs B - A won SDR +2,05 for winner</li>
                    <li>A vs B - A won SDR +2,05 for winner</li>
                </ul>
            </small>
        </div>
    </div>
</div>
@endforeach

@stop
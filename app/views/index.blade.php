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
                <th>Matches Lose</th>
                <th>Maps Lose</th>
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
    </div>
</div>
@endforeach
<!--
<div id="gB" class="jumbotron b" style="height: 100%;">
    <div class="container">
        <h2>Group B</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr class="b header">
                <th>Team</th>
                <th>Played Matches</th>
                <th>Matches Won</th>
                <th>Maps Won</th>
                <th>Matches Lose</th>
                <th>Maps Lose</th>
                <th>SDR</th>
            </tr>

        </table>
    </div>
</div>
<div id="gC"  class="jumbotron c" style="height: 100%;">
    <div class="container">
        <h2>Group C</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr class="c header">
                <th>Team</th>
                <th>Played Matches</th>
                <th>Matches Won</th>
                <th>Maps Won</th>
                <th>Matches Lose</th>
                <th>Maps Lose</th>
                <th>SDR</th>
            </tr>

        </table>
    </div>
</div>
<div id="gD"  class="jumbotron d" style="height: 100%;">
    <div class="container">
        <h2>Group D</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr class="d header">
                <th>Team</th>
                <th>Played Matches</th>
                <th>Matches Won</th>
                <th>Maps Won</th>
                <th>Matches Lose</th>
                <th>Maps Lose</th>
                <th>SDR</th>
            </tr>

        </table>
    </div>
</div>
-->
@stop
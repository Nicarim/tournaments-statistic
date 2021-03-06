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
                <th>Matches lost</th>
                <th>Maps won</th>
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
                        <td>{{round($team->sdr,3)}}</td>
                    </tr>
                    @else
                        <tr class="drop">
                            <td>{{$team->team_name}}</td>
                            <td>{{$team->played}}</td>
                            <td>{{$team->mw}}</td>
                            <td>{{$team->ml}}</td>
                            <td>{{$team->gw}}</td>
                            <td>{{$team->gl}}</td>
                            <td>{{round($team->sdr,3)}}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </table>
        <div class="container text-center small">
            <p>Match history:</p>
        </div>
        @if ($group->matches->count() != 0)
        <div class="container small" style="width:40%; background-color: #d0d0d0">
                <ul class="list-unstyled" style="line-height:1; margin-top:10px; font-size: 15px;">
                    @foreach ($group->matches as $match)
                    @if ($match->win_type == 0)
                    <li><a href="https://osu.ppy.sh/mp/{{$match->room_id}}"><span style="color:green;">{{$match->wTeam->team_name}}</span> vs <span style="color:red;">{{$match->lTeam->team_name}}</span></a> - SDR <b>{{abs(round($match->sdr,3))}}</b> </li>
                    @elseif ($match->win_type == 1)
                    <li><a href="https://osu.ppy.sh/mp/{{$match->room_id}}"><span style="color:green;">{{$match->wTeam->team_name}}</span> vs <span style="color:red;">{{$match->lTeam->team_name}}</span></a> - SDR <b>{{abs(round($match->sdr,3))}}</b><span style="color:red"> Win By Default</span> </li>
                    @endif
                    @endforeach
                </ul>
        </div>
        @endif
    </div>
</div>
@endforeach

@stop
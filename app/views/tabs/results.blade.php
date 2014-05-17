@extends("../master")
@include("tournament/navbar")
<div class="container">
    @include('tournament/tourney-navbar')
    <div class="tab-content">
        <h2>{{$tournament->groupStages->first()->name}}</h2>
        @foreach($tournament->groupStages->first()->group as $group)
            <h3>{{$group->name}}</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Matches Won</th>
                    <th>Matches Lost</th>
                    <th>Games Won</th>
                    <th>Games Lost</th>
                    <th>SDR</th>
                </tr>
                @foreach($group->teams as $team)
                <tr>
                    <td>{{$team->name}}</td>
                    <td>{{$team->matches_won}}</td>
                    <td>{{$team->matches_lost}}</td>
                    <td>{{$team->games_won}}</td>
                    <td>{{$team->games_lost}}</td>
                    <td>{{$team->score_difference}}</td>
                </tr>
                @endforeach
            </table>
        @endforeach
    </div>
</div>
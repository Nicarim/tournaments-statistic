@extends("../master")
@include("tournament/navbar")
<div class="container">
    @include('tournament/tourney-navbar')
    <div class="tab-content">

        <h2>{{$tournament->groupStages->first()->name}}</h2>
        @foreach($tournament->groupStages->first()->group as $group)

            <h3>{{$group->name}}</h3>
            @if (Auth::check())
            <form class="form-inline" role="form" name="match" method="post" action="/settings/{{$tournament->id}}/add_match">
                <div class="form-group">
                    <label class="sr-only" for="matchid">Add Match: </label>
                    <input class="form-control" id="matchid" name="matchid" placeholder="Enter Match ID" />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="skipped">Skip Index: </label>
                    <input class="form-control" id="skipped" name="skipid" placeholder="Skipping IDs (use comma)" />
                </div>
                <input type="hidden" name="group_id" value="{{$group->id}}" />
                <input type="hidden" name="stage_id" value="{{$tournament->groupStages->first()->id}}" />
                <button class="btn btn-default" type="submit">Add</button>
            </form>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Matches Played</th>
                    <th>Matches Won</th>
                    <th>Matches Lost</th>
                    <th>Games Won</th>
                    <th>Games Lost</th>
                    <th>SDR</th>
                </tr>
                @foreach($group->teams as $team)
                <tr>
                    <td>{{$team->name}}</td>
                    <td>{{$team->matches_played()}}</td>
                    <td>{{$team->matches_won}}</td>
                    <td>{{$team->matches_lost}}</td>
                    <td>{{$team->games_won}}</td>
                    <td>{{$team->games_lost}}</td>
                    <td>{{$team->score_difference}}</td>
                </tr>
                @endforeach
            </table>
            @if ($group->Matches->count() != 0)
                <div class="container small" style="width:40%; background-color: #d0d0d0">
                    <ul class="list-unstyled" style="line-height:1; margin-top:10px; font-size: 15px;">
                        @foreach($group->Matches as $match)
                        <li>
                            <a href="https://osu.ppy.sh/mp/{{$match->room_id}}">
                                <span style="color:green">{{$match->wTeam->name}} </span> vs <span style="color:red">{{$match->lTeam->name}}</span> - SDR <b>{{$match->score_difference}}</b>
                                @if (Auth::check())
                                <form action="/settings/{{$tournament->id}}/remove_match" method="post" role="form" style="display:inline">
                                    <input type="hidden" name="match_id" value="{{$match->id}}"/>
                                    <a href="#" type="submit">Remove</a>
                                </form>
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endforeach
    </div>
</div>
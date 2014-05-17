<div class="tab-pane fade" id="groups">
    <h2>Groups:</h2>
    @foreach($tournament->groupStages as $stage)
        <div class="container">
            <h3>{{$stage->name}}</h3>
            <ul>
                @foreach($stage->group as $group)
                <li>{{$group->name}}</li>
                <ul>
                    @foreach($group->teams as $team)
                    <li>{{$team->name}}</li>
                    @endforeach
                </ul>
                @endforeach
            </ul>
        </div>
    @endforeach
    <h2>Add new Group (to group stage):</h2>
    <form role="form" name="groups" method="post" action="/settings/{{$tournament->id}}/groups">
        <div class="form-group">
            <label for="groupname">Name of group:</label>
            <input class="form-control" type="text" id="groupname" name="groupname" style="width:50%;" />
            <label for="whichstage">Select which stage to add to</label>
            <select id="whichstage" name="whichstage" class="form-control" style="width:50%;">
                @foreach($tournament->groupStages as $stage)
                <option value="{{$stage->id}}">{{$stage->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Add!</button>
    </form>
    <h2>Add Teams to group</h2>
    <form role="form" name="teams" method="post" action="/settings/{{$tournament->id}}/teams">
        <div class="form-group">
            <label for="teamname">Team Name</label>
            <input class="form-control" type="text" id="teamname" name="teamname" style="width:50%;" />
            <label for="whichgroup">Which Group</label>
            <select id="whichgroup" name="whichgroup" class="form-control" style="width:50%;">
                @foreach($tournament->groupStages as $stage)
                    @foreach($stage->group as $group)
                        <option value="{{$group->id}}">{{$group->stage->name}}: {{$group->name}}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Add!</button>
    </form>
</div>
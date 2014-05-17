<div class="tab-pane fade" id="groups">
    <h2>Groups:</h2>
    @foreach($tournament->groupStages as $stage)
        <div class="container">
            <h3>{{$stage->name}}</h3>
            <ul>
                @foreach($stage->group as $group)
                <li>{{$group->name}}</li>
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
</div>
<div class="tab-pane fade" id="stages">
    <h2>Stages list:</h2>
    <table class="table">
        <tr>
            <th>Stage name</th>
            <th style="width:30%">Stage type</th>
            <th style="width:10%">Delete</th>
        </tr>
        @foreach ($tournament->stages as $stage)
        <tr>
            <td>{{{$stage->name}}}</td>

            @if ($stage->type == 0)
            <td><span class="label label-info">Group Stage</span></td>
            @elseif ($stage->type == 1)
            <td><span class="label label-info">Elemination Stage</span></td>
            @endif

            <td>
                <form role="form" name="input" method="post" action="/settings/stage_remove/{{$stage->id}}" style="margin: 0">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <h2>Add new stage:</h2>
    <form role="form" name="input2" method="post" action="/settings/{{$tournament->id}}/stages">
        <div class="form-group">
            <label for="stagename">Name of stage:</label>
            <input class="form-control" type="text" id="stagename" name="stagename" style="width:50%;"/>
            <br/><b>Choose type of stage:</b>

            <div class="radio">
                <label>
                    Group stage:
                    <input type="radio" name="stagetype" value="0"/>
                </label>
            </div>
            <div class="radio">
                <label>
                    Elemination stage:
                    <input type="radio" name="stagetype" value="1"/>
                </label>
            </div>
            <label for="playersamount">Max Players</label>
            <input class="form-control" id="playersamount" type="number" name="playersamount"
                   placeholder="Leave empty, to use amount of previous stage halved by 2" style="width:50%;"/>
        </div>
        <button class="btn btn-success" type="submit">Add!</button>
    </form>
</div>
<ul class="nav nav-tabs nav-pills nav-borderfix">
    <li class="active"><a href="#generalset" data-toggle="tab">General Settings</a></li>
    <li><a href="#stages" data-toggle="tab">Stages</a></li>
    <li><a href="#staff" data-toggle="tab">Staff</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="generalset">

        <div class="form-group">
            <form role="form" name="input" method="post" action="/settings/overview/{{$tournament->id}}">
                <h2>Overall Settings</h2>
                <label for="overviewedit">Description of tournament:</label>
                <textarea name="description" id="overviewedit" class="form-control"
                          rows="20">{{$tournament->overview}}</textarea>

                <h2>Prizes for tournaments:</h2>
                <label for="firstplace">First place prize:</label>
                <input type="text" name="prizefirst" class="form-control" id="firstplace" style="width:50%;"
                       value="{{$tournament->prize->first}}"/>

                <label for="secondplace">Second place prize:</label>
                <input type="text" name="prizesecond" class="form-control" id="secondplace" style="width:50%;"
                       value="{{$tournament->prize->second}}"/>

                <label for="thirdplace">Third place prize:</label>
                <input type="text" name="prizethird" class="form-control" id="thirdplace" style="width:50%;"
                       value="{{$tournament->prize->third}}"/>

                <label for="otherplace">Other prizes (leave empty if none):</label>
                <input type="text" name="prizeother" class="form-control" id="otherplace" style="width:50%;"
                       value="{{$tournament->prize->other}}"/>

                <h2>State of tournament</h2>

                <div class="radio">
                    <label>
                        Registration Phase
                        <input type="radio" name="state" value="0" {{{$tournament->state == '0' ? 'checked' : ''}}}/>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        In Progress
                        <input type="radio" name="state" value="1" {{{$tournament->state == '1' ? 'checked' : ''}}}/>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        Completed
                        <input type="radio" name="state" value="2" {{{$tournament->state == '2' ? 'checked' : ''}}}/>
                    </label>
                </div>

                <button class="btn btn-success pull-right" type="submit">Save changes!</button>
            </form>
        </div>
    </div>
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

                <td><a class="btn btn-danger btn-sm" href="/settings/stage_remove/{{$stage->id}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
        <h2>Add new stage:</h2>
        <form role="form" name="input2" method="post" action="/settings/stages/{{$tournament->id}}">
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
    <div class="tab-pane fade" id="staff">
        List of managers.
    </div>
</div>


<ul class="nav nav-tabs nav-pills nav-borderfix">
    <li class="active"><a href="#generalset" data-toggle="tab">General Settings</a></li>
    <li><a href="#stages" data-toggle="tab">Stages</a></li>
    <li><a href="#staff" data-toggle="tab">Staff</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="generalset">

        <div class="form-group">
            <form role="form" name="input" method="post" action="/settings/{{$tournament->id}}">
                <h2>Overall Settings</h2>
                <label for="overviewedit">Description of tournament:</label>
                <textarea name="description" id="overviewedit" class="form-control" rows="20">{{$tournament->overview}}</textarea>

                <h2>Prizes for tournaments:</h2>
                <label for="firstplace">First place prize:</label>
                <input type="text" name="prizefirst" class="form-control" id="firstplace" style="width:50%;" value="{{$tournament->prize->first}}"/>

                <label for="secondplace">Second place prize:</label>
                <input type="text" name="prizesecond" class="form-control" id="secondplace" style="width:50%;" value="{{$tournament->prize->second}}"/>

                <label for="thirdplace">Third place prize:</label>
                <input type="text" name="prizethird" class="form-control" id="thirdplace" style="width:50%;" value="{{$tournament->prize->third}}"/>

                <label for="otherplace">Other prizes (leave empty if none):</label>
                <input type="text" name="prizeother" class="form-control" id="otherplace" style="width:50%;" value="{{$tournament->prize->other}}"/>

                    <h2>State of tournament</h2>
                <div class="radio">
                    <label>
                        Registration Phase
                        @if ($tournament->state == 0)
                        <input type="radio" name="state" value="0" checked/>
                        @else
                        <input type="radio" name="state" value="0"/>
                        @endif
                    </label>
                </div>
                <div class="radio">
                    <label>
                        In Progress
                        @if ($tournament->state == 1)
                        <input type="radio" name="state" value="1" checked/>
                        @else
                        <input type="radio" name="state" value="1"/>
                        @endif
                    </label>
                </div>
                <div class="radio">
                    <label>
                        Completed
                        @if ($tournament->state == 2)
                        <input type="radio" name="state" value="2" checked/>
                        @else
                        <input type="radio" name="state" value="2"/>
                        @endif
                    </label>
                </div>

                <button class="btn btn-danger pull-right" type="submit">Save changes!</button>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="stages">
        <h2>Stages list:</h2>
        <table class="table">
            <tr>
                <th>Stage name</th>
                <th>Stage type</th>
            </tr>
            <tr>
                <td>Group Stage</td>
                <td><span class="label label-info">Group Stage</span></td>
            </tr>
            <tr>
                <td>Round of 16</td>
                <td><span class="label label-info">Elemination Stage</span></td>
            </tr>
            <tr>
                <td>Quarter-finals</td>
                <td><span class="label label-info">Elemination Stage</span></td>
            </tr>
        </table>
        <h2>Add new stage:</h2>
        <div class="form-group">
            <form>

                    <label>
                        Name of stage:
                        <input class="form-control" type="text" name="stagename"/>
                    </label>


                    <br/><b>Choose type of stage:</b>
                    <div class="radio">
                        <label>
                            Group stage:
                            <input type="radio" name="stagetype" value="group"/>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            Elemination stage:
                            <input type="radio" name="stagetype" value="elem"/>
                        </label>
                    </div>
                <button class="btn btn-danger" type="submit">Add!</button>

            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="staff">
        List of managers.
    </div>
</div>

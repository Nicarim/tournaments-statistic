
<ul class="nav nav-tabs nav-pills nav-borderfix">
    <li class="active"><a href="#generalset" data-toggle="tab">General Settings</a></li>
    <li><a href="#stages" data-toggle="tab">Stages</a></li>
    <li><a href="#staff" data-toggle="tab">Staff</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="generalset">

        <div class="form-group">
            <form>
                <h2>Overall Settings</h2>
                <label for="overviewedit">Description of tournament:</label>
                <textarea name="description" id="overviewedit" class="form-control" rows="20">{{$rawoverview}}</textarea>

                <h2>Prizes for tournaments:</h2>
                <label for="firstplace">First place prize:</label>
                <input type="text" name="prizefirst" class="form-control" id="firstplace" style="width:50%;"/>

                <label for="secondplace">Second place prize:</label>
                <input type="text" name="prizesecond" class="form-control" id="secondplace" style="width:50%;"/>

                <label for="thirdplace">Third place prize:</label>
                <input type="text" name="prizethird" class="form-control" id="thirdplace" style="width:50%;" value="asd"/>

                <label for="otherplace">Other prizes (leave empty if none):</label>
                <input type="text" name="prizeother" class="form-control" id="otherplace" style="width:50%;"/>

                    <h2>State of tournament</h2>
                <div class="radio">
                    <label>
                        Registration Phase
                        <input type="radio" name="state" value="registration"/>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        In Progress
                        <input type="radio" name="state" value="inprogress"/>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        Completed
                        <input type="radio" name="state" value="done"/>
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

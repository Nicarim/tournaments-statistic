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
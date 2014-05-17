<div class="tab-pane fade" id="beatmaps">
    <h2>Map Pool</h2>
    @foreach ($tournament->stages as $stage)
        <h3>{{$stage->name}}</h3>
        <ul>
            @foreach($stage->beatmaps as $beatmap)
                <li><a href="https://osu.ppy.sh/b/{{$beatmap->beatmap_id}}">{{$beatmap->fullName()}}</a></li>
            @endforeach
        </ul>
    @endforeach
    <h2>Add Map</h2>
    <form role="form" name="beatmaps" method="post" action="/settings/{{$tournament->id}}/beatmaps">
        <div class="form-group">
            <label for="beatmapid">Beatmap's ID</label>
            <input class="form-control" type="text" id="beatmapid" name="beatmapid" style="width:50%;" />
            <label for="whichstage">Which Stage</label>
            <select id="whichstage" name="whichstage" class="form-control" style="width:50%;">
                @foreach($tournament->groupStages as $stage)
                    <option value="{{$stage->id}}">{{$stage->name}}</option>
                @endforeach
            </select>
            <label for="beatmapsscore">Beatmap Max Score</label>
            <input class="form-control" type="text" id="beatmapsscore" name="beatmapsscore" style="width:50%;" />
        </div>
        <button class="btn btn-success" type="submit">Add!</button>
    </form>
</div>
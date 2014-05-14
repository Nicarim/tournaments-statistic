<div class="tab-pane fade in active" id="overview">
    <!--
    <h2>Prizes:</h2>
    <div class="panel panel-default ">
        <div class="panel-body fixedpaddingpanel">

            <h4 class="fixedpaddingh" style="background-color: rgba(255, 211, 0, 0.20);"><span class="glyphicon glyphicon-heart" style="color:#FEDE2C;"></span> First place: {{$tournament->prize->first}}</h4>
            <h4 class="fixedpaddingh" style="background-color: rgba(192, 192, 192, 0.20);"><span class="glyphicon glyphicon-heart" style="color:#C5CAC9;"></span> Second place: {{$tournament->prize->second}}</h4>
            <h4 class="fixedpaddingh" style="background-color: rgba(139, 69, 19, 0.20);"><span class="glyphicon glyphicon-heart" style="color:#A43E1A;"></span> Third place: {{$tournament->prize->third}}</h4>
            @if (!empty($tournament->prize->other))
            <h4 class="fixedpaddingh" style="background-color: rgba(192, 192, 192, 0.20);"><span class="glyphicon glyphicon-heart" style="color:#C5CAC9;"></span> Consolization prize: {{$tournament->prize->other}}</h4>
            @endif

        </div>
    </div>
    -->
    <div id="description">
        {{$overview}}
    </div>
</div>

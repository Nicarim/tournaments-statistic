@extends("../master")
@include("tournament/navbar")
<div class="container">
    <h1>{{$tournament->name}}</h1>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#schedule"  data-toggle="tab">Schedule</a></li>
        <li><a href="#mappools" data-toggle="tab">Map Pools</a></li>
        <li><a href="#teams" data-toggle="tab">Teams</a></li>
        <li><a href="#results" data-toggle="tab">Results/Stats</a></li>
        <li><a href="#settings" data-toggle="tab">Tournament Settings</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane fade in active" id="overview">
            <div>
            <a class="label label-info pull-right" id="edit-overview" tourid="{{$tournament->id}}" href="#" onclick="editOverview()"> edit </a><!-- edit button -->
            </div>
           <div id="description">
            {{$overview}}
           </div>
        </div>
        <div class="tab-pane fade" id="schedule">Something</div>
        <div class="tab-pane fade" id="mappools">Something</div>
        <div class="tab-pane fade" id="teams">Something</div>
        <div class="tab-pane fade" id="results">Results/Stats</div>
        <div class="tab-pane fade" id="settings">Something</div>
    </div>

</div>
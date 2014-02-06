@extends("../master")
@include("tournament/navbar")
<div class="container">
    <h1>{{$tournament->name}}</h1>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#rules"  data-toggle="tab">Rules</a></li>
        <li><a href="#mappools" data-toggle="tab">Map Pools</a></li>
        <li><a href="#teams" data-toggle="tab">Teams</a></li>
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
        <div class="tab-pane fade" id="rules">Something</div>
        <div class="tab-pane fade" id="mappools">Something</div>
        <div class="tab-pane fade" id="teams">Something</div>
    </div>

</div>
@extends("../master")
@include("tournament/navbar")
<div class="container">
    <h1>{{$tournament->name}}</h1>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <!--
        <li><a href="#schedule"  data-toggle="tab">Schedule</a></li>
        <li><a href="#mappools" data-toggle="tab">Map Pools</a></li>
        <li><a href="#teams" data-toggle="tab">Teams</a></li>
        -->
        <li><a href="#results" data-toggle="tab">Results/Stats</a></li>
        <li><a href="/settings/{{$tournament->id}}">Tournament Settings</a></li>
    </ul>
    <div class="tab-content">
        @include('tabs/overview')
        @include('tabs/schedule')
        @include('tabs/mappools')
        @include('tabs/teams')
        @include('tabs/results')
    </div>

</div>
@extends("../master")
@include("tournament/navbar")
<div class="container">
    <h1>{{$tournament->name}}</h1>
    <ul class="nav nav-tabs nav-pills nav-borderfix">
        <li><a href="/view/{{$tournament->id}}">Home</a></li>
        <li class="active"><a href="#generalset" data-toggle="tab">General Settings</a></li>
        <li><a href="#stages" data-toggle="tab">Stages</a></li>
        <li><a href="#groups" data-toggle="tab">Groups</a></li>
        <li><a href="#beatmaps" data-toggle="tab">Beatmaps</a></li>
        <li><a href="#staff" data-toggle="tab">Staff</a></li>
    </ul>
    <div class="tab-content">
        @include('tabs/options/general')
        @include('tabs/options/stages')
        @include('tabs/options/groups')
        @include('tabs/options/beatmaps')
        @include('tabs/options/managers')
    </div>
</div>

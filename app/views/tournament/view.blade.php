@extends("../master")
@include("tournament/navbar")
<div class="container">
    @include('tournament/tourney-navbar')
    <div class="tab-content">
        @include('tabs/overview')
    </div>

</div>
<h1>{{$tournament->name}}</h1>
<ul class="nav nav-tabs">
    <li class="{{Route::currentRouteName() == 'tourney' ? 'active' : ''}}"><a href="/view/{{$tournament->id}}">Overview</a></li>
    <!--
    <li><a href="#schedule"  data-toggle="tab">Schedule</a></li>
    <li><a href="#mappools" data-toggle="tab">Map Pools</a></li>
    <li><a href="#teams" data-toggle="tab">Teams</a></li>
    -->
    <li class="{{Route::currentRouteName() == 'results' ? 'active' : ''}}"><a href="/results/view/{{$tournament->id}}">Results</a></li>
    @if (Auth::check())
        <li><a href="/settings/{{$tournament->id}}">Tournament Settings</a></li>
    @endif
</ul>
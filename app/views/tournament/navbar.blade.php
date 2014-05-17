<nav class="nav navbar-default navbar-inverse navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="/">Tournaments Management</a>
        <ul class="nav navbar-nav">
            <li><a href="{{URL::route('list')}}">View tourneys</a></li>
            @if (Auth::check())
                <li><a href="{{URL::route('addtourney')}}">Create tourney</a></li>
            @endif
        </ul>
    </div>
</nav>
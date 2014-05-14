@extends("../master")
@include("tournament/navbar")
<body>
<div class="container">
    <h1>Add new tournament</h1>
    <div class="input-group">
    <form role="form" name="input" method="post">
        <div class="form-group">
                <label for="tourney-name">Tournament Name:</label>
                <input type="text" class="form-control" id="tourney-name" name="name" placeholder="e.g. Bahrain Cup 2015">
        </div>
        <div class="form-group">
                <label for="tourney-host">Host:</label>
                <input type="text" class="form-control" id="host-name" name="host" placeholder="Hopefully not Loctav">
        </div>
        <div class="form-group"> Gamemode
            <label class="checkbox">
                <input type="radio" value="0" name="gametype"> osu! Standard
            </label>
            <label class="checkbox">
                <input type="radio" value="1" name="gametype"> Taiko
            </label>
            <label class="checkbox">
                <input type="radio" value="2" name="gametype"> Catch The Beat
            </label>
            <label class="checkbox">
                <input type="radio" value="3" name="gametype"> osu!mania
            </label>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="You think i'm going to give you a hint?">
        </div>  
        <div class="form-group">
                <button type="submit" class="btn btn-default">Add</button>
        </div>
    </form>
    </div>
</div>
</body>
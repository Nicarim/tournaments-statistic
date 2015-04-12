@extends("../master")
@include("tournament/navbar")
<div class="container">
<table class="table">
    <tr>
        <th></th>
        <th style="width:60%">Name</th>
        <th>Hosted by</th>
    </tr>
    @foreach($tournaments as $tournament)
    <tr>
        <td>
            <b class="{{$gamemodecss[$tournament->gamemode]}}"></b>
        </td>
        <td><a href="/results/view/{{$tournament->id}}">{{$tournament->name}}</a></td>
        <td><small>{{$tournament->host}}</small></td>
    </tr>
    @endforeach
</table>
</div>

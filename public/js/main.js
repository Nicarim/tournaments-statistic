/**
 * Created by Marcin on 06.02.14.
 */
function editOverview(){
    var id = $("#edit-overview").attr("tourid");
    $.get("/view_raw/"+id+"/overview",function(result){
        $("#description").fadeOut(200, function(){
            addEditfield(result, id);
        });
    });
}
function saveOverview(){
    var text = $("#textarea").val();
    var id = $("#textarea").attr("tourid");
    $.post("/edit_raw/"+id+"/overview",{ overview: text }).done(function(result){
        $("#editfield").fadeOut(400, function(){
            $("#overview").append("<div> <a class='label label-info pull-right' id='edit-overview' onclick='editOverview()' tourid='"+id+"' href='#'> edit </a><!-- edit button --></div>" +
                "<div id='description'>"+result+"</div>" +
                "</div>");
        });
        $("#editfield").remove();

    });
}
function addEditfield(result, id){
    $("#edit-overview").remove();
    $("#description").remove();
    $("#overview").append("<div id='editfield' style='display:none'> " +
        "<textarea id='textarea' class='form-control' cols='50' rows='25' tourid='"+id+"'>"+result+"</textarea>" +
        "<button class='btn btn-danger form-control' onclick='saveOverview()'>Save</button>" +
        "</div>");
    $("#editfield").fadeIn(400);

}
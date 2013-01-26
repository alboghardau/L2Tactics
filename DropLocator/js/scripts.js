
$(document).ready(function(){


$("input.smap").click(function()
{
    $("td:empty").each(function()
{
   
   $(this).parent().toggle();
   
});

});


});


"use strict"

function resetAll()
{
    $('form').find("input").each(function() {
    $(this).val('');
   });
}


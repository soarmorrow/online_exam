'use strict';

window.addEventListener('load', function() {
    new FastClick(document.body);
}, false);
$(function() {
    $(document).foundation();
});
var menu = $(".type");
$(document).on("contextmenu", function(e) {
    console.log('disabled');
    e.preventDefault();
});
$.ajax({url: 'type.json', dataType: 'json', type: 'GET', success: function(response, status, xhr) {
        $.each(response, function(i, val) {
            menu.append($('<option></option>').val(val.id).html(val.name));
        });
    }, error: function(resp) {
        console.log(resp);
    }});
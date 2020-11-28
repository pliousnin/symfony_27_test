"use strict";

require('Alert.js');
const A = new Alert;
require('AjaxRequest.js');
const Ajax = new AjaxRequest;


$("#gen__100").click(function(){
    A.alert('Bin dabei.');
    Ajax.json('gen__100');
});

function require(script) {
    $.ajax({
        url: 'JS/' + script,
        dataType: "script",
        async: false,           // <-- This is the key
        success: function () {
            // all good...
        },
        error: function () {
            throw new Error("Could not load script " + script);
        }
    });
}
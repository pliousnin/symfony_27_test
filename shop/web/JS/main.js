"use strict";

require('Alert.js');
const A = new Alert;

A.alert('test');


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
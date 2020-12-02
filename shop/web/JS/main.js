"use strict";

require('Alert.js');
const A = new Alert;
require('AjaxRequest.js');
const Ajax = new AjaxRequest;
require('General.js');
const G = new General;
require('Search.js');
const S = new Search;



$("#gen__100").click(function(){
    Ajax.json('gen__100');
    location.reload();
});
$("#update__cron").click(function(){
    Ajax.json('',{}, 0, 'update');
});

$(".page-item").click(function(e){
    if (
        !(
            $(e.currentTarget).hasClass('active') ||
            $(e.currentTarget).hasClass('disabled')
        )
    ){
        G.paging(e);
    }
});

$('.search__product').keyup(function(e){
    S.doSearchRequest(e);
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
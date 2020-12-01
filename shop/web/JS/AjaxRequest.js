class AjaxRequest{
    json(action, data = {}, callback = 0, url = 'ajax'){
        data.action = action;
        $.ajax({
            url: url,
            data: data,
            method: 'POST'
        }).done(function(e) {
            if (typeof e.error != "undefined"){
                A.alert(e.error);
            }
            if (callback != 0){
                callback(e);
            }
            console.log(e);
        });
    }
}
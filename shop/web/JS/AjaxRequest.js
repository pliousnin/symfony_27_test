class AjaxRequest{
    json(action, data = {}, url = 'ajax'){
        data.action = action;
        $.ajax({
            url: url,
            data: data,
            method: 'POST'
        }).done(function(e) {
            console.log(e);
        });
    }
}
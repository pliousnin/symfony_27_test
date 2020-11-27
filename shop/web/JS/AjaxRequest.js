class AjaxRequest{
    json(url, data = {}){
        $.ajax({
            url: url,
            data: data
        }).done(function(e) {
            console.log(e);
        });
    }
}
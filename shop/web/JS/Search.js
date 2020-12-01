class Search{
    doSearchRequest(e){
        var q = $(e.currentTarget).val();
        // console.log(e);
        Ajax.json('', {'q': q}, 0, 'search');
    }
}
class General{
    paging(e){
        var page = $(e.currentTarget).children().text().trim();
        if (page > 0){
            $('.page-item').removeClass('active');
            $(e.currentTarget).addClass('active');
            $('.alert-success').remove();
            Ajax.json('paging', {page: page}, General.__paging);
        }
    }
    static __paging(e){
        $(e.html).appendTo('.jumbotron');
    }
}
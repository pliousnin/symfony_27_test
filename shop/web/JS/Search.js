class Search{
    doSearchRequest(e){
        var q = $(e.currentTarget).val();
        if (q.length > 3){
            var ele = '.search__product';
            var input_width = $(ele).width();
            var window_width = $(window).width();
            var of = $(ele).offset(), // this will return the left and top
                left = of.left, // this will return left
                right = $(window).width() - left - $(ele).width();
            var data = {
                'q': q,
                'input_width': input_width,
                'window_width': window_width,
                'left': left,
                'right': right
            };
            Ajax.json('', data, Search._renderSearch, 'search');
        }
    }

    static _renderSearch(e){
        if ($('.search__result').length > 0) {
            $('.search__result').remove();
        }
        $('.search__product').after(e.html);
        var top = 20 + $('.search__result')[0].offsetHeight / 2;
        var top = 166;

        $('.search__result').css({'transform' : 'translate(-240px, ' + top + 'px)'});

        if ($('.search__result').length > 0) {
            $('body').on('click', function(e) {
                if (!$(e.target).hasClass('search__result')){
                    $('.search__result').remove();
                    $('body').off('click');
                }
            });
        }
        setTimeout(function() {
            if (top != 20 + $('.search__result')[0].offsetHeight / 2){
                top = 20 + $('.search__result')[0].offsetHeight / 2;
                $('.search__result').css({'transform' : 'translate(-240px, ' + top + 'px)'});
            }
        }, 500);
    }
}
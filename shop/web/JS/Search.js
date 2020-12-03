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
            Ajax.json('', data, 0, 'search');
        }
    }
}
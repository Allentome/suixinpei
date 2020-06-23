$(document).ready(
    $(function () {
        var $imgs = $('.h-imgs');
        var $current_img = $imgs.first();
        $imgs.first().addClass('visible');
        var $num_list = $('.h-num_list');
        var $current_num = $num_list.first();
        $current_num.addClass('opaque');

        $('#h-num').on('mouseover', '.h-num_list', function () {
            changeImg($(this));
            clearInterval(timer);
        }).on('mouseleave', '.h-num_list', function () {
            timer = setInterval(next, 5000)
        });
        function changeImg($this) {
            $current_num.toggleClass('opaque');
            $this.toggleClass('opaque');
            $current_num = $this;
            $current_img.toggleClass('visible');
            $current_img = $imgs.eq($current_num.index());
            $current_img.toggleClass('visible');
        }
        function next() {
            var index = $current_num.index();
            index = (++index) % 4;
            changeImg($num_list.eq(index));
        }
        var timer = setInterval(next, 5000);

    }));
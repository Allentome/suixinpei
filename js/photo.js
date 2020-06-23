$(document).ready(function () {
    $('.a').change(function(e) {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                $('.img').attr('src', this.src);
                console.log(this.width)
            };
            img.src = _URL.createObjectURL(file);
        }
    })
});
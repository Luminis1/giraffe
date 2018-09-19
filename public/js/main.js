function activeLink() {
    var search = window.location.search.substr(1),
    keys = {};
    search.split('&').forEach(function(item) {
        item = item.split('=');
        keys[item[0]] = item[1];
    });
    $('.page-link').each(function(){
        if($(this).data('page') == keys.page){
            $(this).addClass('active');
        }
    });
}

$(document).ready(function () {
    activeLink();
});

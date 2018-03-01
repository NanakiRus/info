// add active for links.
var url = window.location;

$('nav#sidebar div.list-group a').filter(function() {
    return this.href == url;
}).addClass('active');
//--------------------
    var inFormOrLink;
$('a').live('click', function() { inFormOrLink = true; });
$('form').bind('submit', function() { inFormOrLink = true; });

$(window).bind("beforeunload", function() { 
    return inFormOrLink ? "Do you really want to close?" : null; 
})
$('.answer a').click(function(){
    $('#CommentCommentid').val($(this).attr('comment'));
});
jQuery('.creload').on('click', function() {
    var mySrc = $(this).prev().attr('src');
    var glue = '?';
    if(mySrc.indexOf('?')!=-1)  {
        glue = '&';
    }
    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
    return false;
});
$('#CommentSecurityCode').parent().addClass('input-field');
$('<i class="material-icons right">send</i>').appendTo('.submitdiv');
$(document).ready(function() {
    $('pre').each(function(i, block) {
        hljs.highlightBlock(block);
    });
});
$('<i class="material-icons prefix">account_circle</i>').prependTo('.input-name');
$('<i class="material-icons prefix">email</i>').prependTo('.input-mail');
$('<i class="material-icons prefix">mode_edit</i>').prependTo('.input-body');
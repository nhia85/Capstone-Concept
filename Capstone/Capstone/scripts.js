$(function(){
    $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        $('#tabs a.current').removeClass('current');
        $('.tab-section:visible').hide();
        $(this.hash).show();
        $(this).addClass('current');
        e.preventDefault();
    }).filter(':first').click();
});
$(function(){
    $('.tab-section').hide();   
});
$(function(){
    $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        e.preventDefault();
    });
});
$(function(){
    $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        $('.tab-section:visible').hide();
        $(this.hash).show();
        e.preventDefault();
    });
});
$(function(){
    $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        $('#tabs a.current').removeClass('current');
        $('.tab-section:visible').hide();
        $(this.hash).show();
        $(this).addClass('current');
        e.preventDefault();
    });
});
$(function(){
    $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        $('#tabs a.current').removeClass('current');
        $('.tab-section:visible').hide();
        $(this.hash).show();
        $(this).addClass('current');
        e.preventDefault();
    }).filter(':first').click();
});
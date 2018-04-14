$(document).ready(function(){
    target = $('#fieldsets');
    template = $('.fieldset').first();
    $('#add_more').click(function(){
        template.clone().appendTo(target);
    });
})
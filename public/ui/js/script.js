$(document).ready(function () {
    target = $('#fieldsets');
    template = $('.fieldset').first();
    $('#add_more').click(function () {
        template.clone().appendTo(target).find("input[type='text']").val("");
    });

    $('#submit_with_confirm').click(function () {
        flag = confirm('Do you want to add more?')
        $('#add_again').val(flag ? "yes" : "no");   
        $('#submit').click();
        //$('#frm).submit(); This is the proper way of submitting form from jquery
        //But it is not working
    });
})
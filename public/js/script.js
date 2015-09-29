$(document).ready(function() {
    $('#add_task_form').hide();
    $('#tasks_done').hide();

    $('#show_add_form_button').on('click', function() {
        $('#add_task_form').slideToggle();
        $('#description').focus();
    });

    $('#show_done_tasks').on('click', function() {
        $('#tasks_done').slideToggle();
    });

    $('#date_picker').datepicker({
        dateFormat: "yy-mm-dd"
    });
    $('#date_picker').on('click', function() {
        $('#specific_date').prop('checked', true);
    });


    $('.complete_button').bind('click', function() {
        alert('Complete...');
    });

    $('#flash').hide().slideDown().delay(1500).slideUp();

});


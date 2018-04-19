$(document).ready(function () {

    $('#addItem').on('click', addItem);
    $('#tasks').on('change', '.completeItem', completeItem); //This is used to strike out the task as completed.
    $('#tasks').on('click', '.deleteItem', deleteItem); //This allows you to delete your item of choice by clicking on the little trash bin. 
    $('#tasks').on('click', '.textTodo', beginEditing);
    $('#tasks').on('click', '.saveButton', stopEditing);
    $('#newItem').on('keypress', function (event) {
        if (event.which === 13) {
            addItem();
            event.preventDefault();
        }
    });

    function beginEditing(event) {

        var currentText = $(this).parent().find('.textTodo').text(); //gets the current text values that are on the list 
        $(this).parent().find('.editText').val(currentText); //places it within the textbox 
        $(this).parent().find('.editText').show(); //shows the textbox with the new values 
        $(this).parent().find('.saveButton').show();
        $(this).parent().find('.textTodo').hide(); //gets rid of the old text values
    }

    function stopEditing(event) {
        $(this).hide(); //This hides the save button until you decide to edit an entry
        var valNew = $(this).parent().find('.editText').val();
        $(this).parent().find('.editText').hide();
        $(this).parent().find('.textTodo').text(valNew)
        $(this).parent().find('.textTodo').show();
    }

    function addItem(event) {
        var newItemText = $('#newItem').val();
        $('#tasks').append('<li><input class = "completeItem" type = "checkbox"><span class = "textTodo">' + newItemText + '</span><input type = "text" class = "editText"><button class = "btn btn-info saveButton">save</button><span class = "glyphicon glyphicon-trash deleteItem"></span></li>');
        $('#newItem').val(""); //This clears out the text box every time something new is entered. 

    }

    function deleteItem(event) { // delete function
        $(this).parent().remove();
    }

    function completeItem(event) { // complete function
        $(this).parent().toggleClass('done');


    }

}); //(https://www.udemy.com/the-complete-web-developer-course-2/learn/v4/content) 

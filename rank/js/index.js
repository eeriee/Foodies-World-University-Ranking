
$(function() { 

    $("#country_form").on('submit', function(event) {
        var ajaxRequest;

        /* Stop form from submitting normally */
        event.preventDefault();

        /* Clear result div*/
        $("#country_result").html('');

        /* Get from elements values */
        var values = $(this).serialize();

        /* Send the data using post and put the results in a div */
        ajaxRequest= $.ajax({
            url: "form.php",
            type: "post",
            data: values
        });

        /*  request cab be abort by ajaxRequest.abort() */
        ajaxRequest.done(function (response){
            // show successfully for submit message
            $("#country_result").html(response);
        });

        /* On failure of request this function will be called  */
        ajaxRequest.fail(function (){
            // show error
            $("#country_result").html('There is error while submit');
        });
    });

    $("#uni_form").on('submit', function(event) {
        var ajaxRequest;

        /* Stop form from submitting normally */
        event.preventDefault();

        /* Clear result div*/
        $("#uni_result").html('');

        /* Get from elements values */
        var values = $(this).serialize();

        /* Send the data using post and put the results in a div */
        ajaxRequest= $.ajax({
            url: "form.php",
            type: "post",
            data: values
        });

        /*  request cab be abort by ajaxRequest.abort() */
        ajaxRequest.done(function (response){
            // show successfully for submit message
            $("#uni_result").html(response);
        });

        /* On failure of request this function will be called  */
        ajaxRequest.fail(function (){
            // show error
            $("#uni_result").html('There is error while submit');
        });
    });

});


function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";

    if (tabName == "homeTab") {
        $(".footer").css("display", "block");
    } else {
        $(".footer").css("display", "none");
    }

}





// JavaScript Document



$(document).ready(function () {



   $('a.show_form').on('click', function() {

   $('#form_wrapper').show();

   

   });



   $('#frmklasifikaceForm-send').click(function(e) {

        var answer = confirm('Opravdu potvrdit změny?');



        if (!answer) {

            e.preventDefault();

            return false;

        }



        return true;

    });

    

   $('#frmklasifikaceForm-cancel').click(function(e) {

        var answer = confirm('Opravdu chcete formulář zavřít(případné změny nebudou uloženy)?');



        if (!answer) {

            e.preventDefault();

            return false;

        }



        return true;

    });  

  
    $('#frmopravaForm-send').click(function(e) {

        var answer = confirm('Opravdu chcete opravit uživatelovu klasifikaci na vaší?');



        if (!answer) {

            e.preventDefault();

            return false;

        }



        return true;

    });


    

});
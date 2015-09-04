$(document).ready(function(){
var userId;
$('#uploadedFiles').hide();
$('#uploadedLinks').hide();
$('#newFilesHr').hide();
$('#newLinksHr').hide();

  setTimeout("$('.flash-success').slideToggle(500);",6000 );
  setTimeout("$('.flash-danger').slideToggle(500);",6000 );

  $('#input_project_partners').hide();
  $('input[name=have_partners]').change(function(){
     $('#input_project_partners').slideToggle();
  });
  $('#input_project_rewards').hide();
  $('input[name=have_rewards]').change(function(){
     $('#input_project_rewards').slideToggle();
  });

  $('#ifgroup').hide();
  $('input[name=have-group]').change(function(){
     $('#ifgroup').slideToggle();
  });

  $('#internal_collaborators_input').hide();
  $('input[name=have_internal_search]').change(function(){
     $('#internal_collaborators_input').slideToggle();
  });

  $('#external_collaborators_input').hide();
  $('input[name=have_external_search]').change(function(){
     $('#external_collaborators_input').slideToggle();
  });

  $('#have_certificates_input').hide();
  $('input[name=have_certificates]').change(function(){
     $('#have_certificates_input').slideToggle();
  });

  $(function () {
    //FILE UPLOAD
     var url = '/upload';
     var deleteUrl = '/file/remove/';
     $('#fileupload').fileupload({
         url: url,
         dataType: 'json',
         done: function (e, data) {
             $.each(data.result.files, function (index, file) {
                 $('<p/>').text(file.name).appendTo('#files');
                //  $('<p/>').html('<a href="'+deleteUrl+file.id+'">Delete</a>').appendTo('#files');
             });
         },
         progressall: function (e, data) {
             var progress = parseInt(data.loaded / data.total * 100, 10);
             $('#progress .progress-bar').css(
                 'width',
                 progress + '%'
             );
         }
     }).prop('disabled', !$.support.fileInput)
         .parent().addClass($.support.fileInput ? undefined : 'disabled');

     $('#submitUpload').click(function(){
         var newFiles = $('#files').html();
         $('#uploadedFiles').html(newFiles);
         $('<br>').prepend('#uploadedFiles');
         $('#uploadedFiles').prepend('<br>');
         $('#newFilesHr').fadeIn();
         $('#uploadedFiles').fadeIn();
     });

     //LINK UPLOAD
     $('#submitLink').click(function(){
         var postUrl = '/addlink';
         var inputLink = $('#link').val();
         var dataLink = 'link='+inputLink;
         if(inputLink != '' && inputLink != null){
           $.post(postUrl, dataLink, function( data ) {
              var link = data.link[0].name;
              $('<a/>').text(data.link[0].name).attr('target', '_blank').attr('href', link).appendTo('#links');
              $('<br>').appendTo('#links');
           });
         }
     });

     $('#submitUploadLink').click(function(){
         var newLinks = $('#links').html();
         $('#uploadedLinks').html(newLinks);
         $('#newLinksHr').fadeIn();
         $('#uploadedLinks').fadeIn();
     });

     validUser = function(userId){
       var validUrl = '/admin/candidate/valid/'+ userId;
       var dataUser = 'id='+userId;
       var cible, hauteur;
       $.post(validUrl, dataUser, function(data){
          if(data == 1){
              $('.ajax-success').text('Candidature validée avec succès');
              cible = 'success'
          }else if(data == 0){
              $('.ajax-success').text('Candidature invalidée avec succès');
              cible = 'success'
          }else if(data == 'missing'){
              $('.ajax-danger').text('Impossible de valider la candidature, manque d\'informations');
              $('input[name='+userId+']').attr('checked', false);
              cible = 'danger';
          }
          $('.ajax-'+cible+'').slideToggle();
          hauteur = $(".ajax-success").offset().top;
          hauteur = hauteur - 200;
          $("html,body").animate({
              scrollTop: hauteur
          }, 200);
          setTimeout("$('.ajax-"+cible+"').slideToggle(500);",6000 );
       });
     };

     validPayment = function(userId){
       var validUrl = '/admin/candidate/payment/'+ userId;
       var dataUser = 'id='+userId;
       var cible, hauteur;
       $.post(validUrl, dataUser, function(data){
          if(data == 1){
              var alert = 'Paiement validé avec succès';
              toastr.success(alert);
          }else if(data == 0){
              var alert = 'Paiement invalidé avec succès';
              toastr.success(alert);
          }else if(data == 'missing'){
              var alert = 'Impossible de valider le paiement, manque d\'informations';
              toastr.error(alert);
              $('input[name=pay-'+userId+']').attr('checked', false);
          }
       });
     };
 });

});

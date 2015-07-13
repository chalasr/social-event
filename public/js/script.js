$(document).ready(function(){

$('#uploadedFiles').hide();
$('#uploadedLinks').hide();
$('#newFilesHr').hide();
$('#newLinksHr').hide();

  setTimeout("$('.alert-success').slideToggle(500);",6000 );
  setTimeout("$('.alert-danger').slideToggle(500);",6000 );

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

     $('#btn-valid').on("change",function(){
         var userId = $('#user').val();
         var validUrl = '/admin/candidate/valid/'+ userId;
         var dataUser = 'id='+userId;
         $.post(validUrl, dataUser, function(data){
            if(data == 1)
                $('.alert-success').text('Candidature validée avec succès');
            else
                $('.alert-success').text('Candidature invalidée avec succès');

            $('.alert-success').show();
         });
     });

 });

});

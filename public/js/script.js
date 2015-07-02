$(document).ready(function(){

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

});

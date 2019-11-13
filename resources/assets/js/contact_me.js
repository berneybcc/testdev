var listcontact= jQuery('#list-contact');
$(function() {

  $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      $this = $("#sendMessageButton");
      var form = $this.closest('form').attr('action');
      var dataserialize=$this.closest('form').serialize();

      $.ajax({
        url: form,
        type: "GET",
        data: dataserialize,
        cache: false,
        success: function(data) {
          // Success message
          if(data.error){
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append($("<strong>").text("Sorry "+data.error));
            $('#success > .alert-danger').append('</div>');
          }
          else{
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-success')
              .append("<strong>"+data.message+"</strong>");
            $('#success > .alert-success')
              .append('</div>');
            //clear all fields
            $('#contactForm').trigger("reset");
            $('.view-info-contact').show();
            selectcontact();
          }
        },
        error: function() {
          // Fail message
          $('#success').html("<div class='alert alert-danger'>");
          $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
          $('#success > .alert-danger').append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
  $('.js-listcontact').on('click',function(){
    selectcontact();
  })
  actionContact();
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});

var selectcontact =function(){
  jQuery.ajax({
    url: listcontact.data('urllist')+'/list',
    cache: false,
    dataType:'json',
    success: function(data) {
      if(data){
        $num=1;
        var html="";
        listcontact.find('table tbody').children().remove();
        for(var i =0;i <data.length;i++){
          html+="<tr><td>"+$num+"</td>";
          html+="<td>"+data[i].id_number_contact+"</td>";
          html+="<td>"+data[i].name_contact+"</td>";
          html+="<td>"+data[i].email_contact+"</td>";
          html+="<td>"+data[i].phone_contact+"</td>";
          html+="<td>"+data[i].message_contact+"</td>";
          html+="<td>"+data[i].date_create+"</td>";
          html+="<td><a class='js-action-edit' data-modal='editUser' href='"+listcontact.data('urllist')+"/selectuser/"+data[i].id+"'>Edit</a> ";
          html+=" <a class='js-action-delete' href='"+listcontact.data('urllist')+"/delete/"+data[i].id+"'>Delete</a></td>";
          html+="</tr>";
          $num++;
        }
        listcontact.find('table tbody').append(html);
        listcontact.css('display','block');
        $('.js-listcontact').css('display','block');
        actionContact();
        var point=$('#list-contact').offset().top - 240;
        $('html,body').animate({scrollTop:point},500);
      }
      else{
        listcontact.css('display','none');
        $('.js-listcontact').css('display','none');
        var point=$('#contact').offset().top - 71;
        $('html,body').animate({scrollTop:point},500);
      }
    }
  });
};

var actionContact= function(){
  $('.js-action-delete').on('click',function(e){
    e.preventDefault();
    jQuery.ajax({
      url: $(this).attr('href'),
      cache: false,
      dataType:'json',
      success: function(data) {
        if(data){
          selectcontact();
        }
      }});
  });
  $('.js-action-edit').on('click',function(e){
    e.preventDefault();
    var modal=$("#"+$(this).data('modal'));
    modal.modal();
    jQuery.ajax({
      url: $(this).attr('href'),
      cache: false,
      dataType:'json',
      success: function(data) {
          if(data){
            var formname=modal.find('form');
            formname.attr('action',listcontact.data('urllist')+'/update/'+data[0].id);
            $ .each(data[0],function(key, info){
              formname.find('#'+key).val(info);
            })            
            submitmodal(formname);
          }
    }});
  });
};

var submitmodal = function(form){
  form.on('submit',function(e){
    e.preventDefault();
    jQuery.ajax({
      url:form.attr('action'),
      data:form.serialize(),
      dataType:'json',
      type:'GET',
      success:function(data){
        if(data){
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>"+data.message+"</strong>");
          $('#success > .alert-success')
            .append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
          $('.view-info-contact').show();
          selectcontact();
          var modal =jQuery("#"+jQuery('.js-action-edit').data('modal'));
          modal.find('form').trigger('reset');
          modal.modal('hide');
        }
      }
    })
  })
};


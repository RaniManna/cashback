$(function($) {
    "use strict";

    /* ***************************************************************
    ==========disabling default behave of form submits start==========
    *****************************************************************/
    $("#ajaxEditForm").attr('onsubmit', 'return false');
    $("#ajaxForm").attr('onsubmit', 'return false');
    $("#ajaxForm2").attr('onsubmit', 'return false');
    /* *************************************************************
    ==========disabling default behave of form submits end==========
    ***************************************************************/



    /* ***************************************************
    ==========bootstrap datepicker start==========
    ******************************************************/
    $('.datepicker').datepicker({
      autoclose: true
    });
    /* ***************************************************
    ==========bootstrap datepicker end==========
    ******************************************************/



    /* ***************************************************
    ==========dm uploader single file upload start==========
    ******************************************************/

    function ui_single_update_active(element, active) {
        element.find('div.progress').toggleClass('d-none', !active);
        element.find('.progressbar').toggleClass('d-none', active);

        element.find('input[type="file"]').prop('disabled', active);
        element.find('.btn').toggleClass('disabled', active);

        element.find('.btn i').toggleClass('fa-circle-o-notch fa-spin', active);
        element.find('.btn i').toggleClass('fa-folder-o', !active);
    }

    function ui_single_update_progress(element, percent, active) {
        active = (typeof active === 'undefined' ? true : active);

        var bar = element.find('div.progress-bar');

        bar.width(percent + '%').attr('aria-valuenow', percent);
        bar.toggleClass('progress-bar-striped progress-bar-animated', active);

        if (percent === 0) {
            bar.html('');
        } else {
            bar.html(percent + '%');
        }
    }

    function ui_single_update_status(element, message, color) {
        color = (typeof color === 'undefined' ? 'muted' : color);

        element.find('small.status').prop('class', 'status text-' + color).html(message);
    }


    $('.drag-and-drop-zone').dmUploader({ //
        url: $('.drag-and-drop-zone').prop('action'),
        multiple: false,
        allowedTypes: 'image/*',
        extFilter: ['jpg', 'jpeg', 'png'],
        onDragEnter: function() {
            // Happens when dragging something over the DnD area
            this.addClass('active');
        },
        onDragLeave: function() {
            // Happens when dragging something OUT of the DnD area
            this.removeClass('active');
        },
        onInit: function() {
            // Plugin is ready to use

            this.find('.progressbar').val('');
        },
        onComplete: function() {
            // All files in the queue are processed (success or error)
        },
        onNewFile: function(id, file) {
            // When a new file is added using the file selector or the DnD area

            if (typeof FileReader !== "undefined") {
                var reader = new FileReader();
                var img = this.find('img');

                reader.onload = function(e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        },
        onBeforeUpload: function(id) {
            // about tho start uploading a file
            ui_single_update_progress(this, 0, true);
            ui_single_update_active(this, true);

            ui_single_update_status(this, 'Uploading...');
        },
        onUploadProgress: function(id, percent) {
            // Updating file progress
            ui_single_update_progress(this, percent);
        },
        onUploadSuccess: function(id, data) {
            var response = JSON.stringify(data);

            let ems = document.getElementsByClassName('em');
            for (let i = 0; i < ems.length; i++) {
              ems[i].innerHTML = '';
            }

            // A file was successfully uploaded
            console.log(data);


            // if only the image is being stored
            if (data.status == "success") {
              bootnotify(data.image + " added successfully!", 'Success!', 'success');
              ui_single_update_active(this, false);
              // You should probably do something with the response data, we just show it
              this.find('.progressbar').val("Uploaded successfully");
              this.find('.form-control[readonly]').attr('style', 'background-color: #28a745 !important; text-alignment: center !important; opacity: 1 !important;border: none !important;');
              ui_single_update_status(this, 'Upload completed.', 'success');
            }


            // if the image is being stored along with other form fields
            else if (data.status == "session_put") {
              $("#image").attr('name', data.image);
              $("#image").val(data.filename);
              ui_single_update_active(this, false);
              // You should probably do something with the response data, we just show it
              this.find('.progressbar').val("Uploaded successfully");
              this.find('.form-control[readonly]').attr('style', 'background-color: #28a745 !important; text-alignment: center !important; opacity: 1 !important;border: none !important;');
              ui_single_update_status(this, 'Upload completed.', 'success');
            }


            // if you need a reload after image store
            else if (data.status == "reload") {
              ui_single_update_active(this, false);
              // You should probably do something with the response data, we just show it
              this.find('.progressbar').val("Uploaded successfully");
              this.find('.form-control[readonly]').attr('style', 'background-color: #28a745 !important; text-alignment: center !important; opacity: 1 !important;border: none !important;');
              ui_single_update_status(this, 'Upload completed.', 'success');
              location.reload();
            }

            // if error is returned while storing image
            else if(typeof data.errors.error != 'undefined') {
              if (typeof data.errors.file != 'undefined') {
                document.getElementById('err'+data.id).innerHTML = data.errors.file[0];
              }
            }
        },
        onUploadError: function(id, xhr, status, message) {
            // Happens when an upload error happens
            ui_single_update_active(this, false);
            ui_single_update_status(this, 'Error: ' + message, 'danger');
        },
        onFallbackMode: function() {
            // When the browser doesn't support this plugin :(
        },
        onFileSizeError: function(file) {
            ui_single_update_status(this, 'File excess the size limit', 'danger');

        },
        onFileTypeError: function(file) {
            ui_single_update_status(this, 'File type is not an image', 'danger');

        },
        onFileExtError: function(file) {
            ui_single_update_status(this, 'File extension not allowed', 'danger');

        }
    });
    /* ***************************************************
    ==========dm uploader single file upload end==========
    ******************************************************/


    /* ***************************************************
    ==========fontawesome icon picker start==========
    ******************************************************/
    $('.icp-dd').iconpicker();
    /* ***************************************************
    ==========fontawesome icon picker upload end==========
    ******************************************************/



    /* ***************************************************
    ==========NIC edit initialization start==========
    ******************************************************/
    var elementArray = document.getElementsByClassName("nic-edit");
    for (var i = 0; i < elementArray.length; ++i) {
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                elementArray[i]
            )
        );
        $('.nicEdit-panelContain').parent().width('100%');
        $('.nicEdit-panelContain').parent().next().width('98%');
    }

    if ($(".nicEdit-main").length > 0) {
        $(".nicEdit-main").parent().attr('style', 'width: 100%; border: 1px solid #2f374b; background-color: #1a2035; color: #fff;border-radius:0px 0px 5px 5px;');
    }
    /* ***************************************************
    ==========NIC edit initialization end==========
    ******************************************************/


    /* ***************************************************
    ==========Bootstrap Notify start==========
    ******************************************************/
    function bootnotify(message, title, type) {
      var content = {};

      content.message = message;
      content.title = title;
      content.icon = 'fa fa-bell';

      $.notify(content,{
        type: type,
        placement: {
          from: 'top',
          align: 'right'
        },
        showProgressbar: true,
        time: 1000,
        allow_dismiss: true,
        delay: 4000,
      });
    }
    /* ***************************************************
    ==========Bootstrap Notify end==========
    ******************************************************/



    /* ***************************************************
    ==========Form Submit with AJAX Request Start==========
    ******************************************************/
    $("#submitBtn").on('click', function(e) {
      $(e.target).attr('disabled', true);

      let ajaxForm = document.getElementById('ajaxForm');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxForm").attr('action');
      let method = $("#ajaxForm").attr('method');
       console.log(url);
       console.log(method);

      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          $(e.target).attr('disabled', false);

          $(".em").each(function() {
            $(this).html('');
          })

          if (data == "success") {
            location.reload();
          }

          // if error occurs
          else if(typeof data.error != 'undefined') {
            for (let x in data) {
              console.log(x);
              if (x == 'error') {
                continue;
              }
              document.getElementById('err'+x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
    /* ***************************************************
    ==========Form Submit with AJAX Request End==========
    ******************************************************/

    /* ***************************************************
    ==========Form Submit with AJAX Request Start==========
    ******************************************************/
    $("#submitBtn2").on('click', function(e) {
      $(e.target).attr('disabled', true);

      let ajaxForm = document.getElementById('ajaxForm2');
      let fd = new FormData(ajaxForm);
      let url = $("#ajaxForm2").attr('action');
      let method = $("#ajaxForm2").attr('method');
       console.log(url);
       console.log(method);

      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          $(e.target).attr('disabled', false);

          $(".em").each(function() {
            $(this).html('');
          })

          if (data == "success") {
            location.reload();
          }

          // if error occurs
          else if(typeof data.error != 'undefined') {
            for (let x in data) {
              console.log(x);
              if (x == 'error') {
                continue;
              }
              document.getElementById('err'+x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
    /* ***************************************************
    ==========Form Submit with AJAX Request End==========
    ******************************************************/




    /* ***************************************************
    ==========Form Prepopulate After Clicking Edit Button Start==========
    ******************************************************/
    $(".editbtn").on('click', function() {
      let datas = $(this).data();
      delete datas['toggle'];
      console.log(datas);

      for (let x in datas) {
        $("#in"+x).val(datas[x]);
      }
    });
    /* ***************************************************
    ==========Form Prepopulate After Clicking Edit Button End==========
    ******************************************************/




    /* ***************************************************
    ==========Form Update with AJAX Request Start==========
    ******************************************************/
    $("#updateBtn").on('click', function(e) {

      let ajaxEditForm = document.getElementById('ajaxEditForm');
      let fd = new FormData(ajaxEditForm);
      let url = $("#ajaxEditForm").attr('action');
      let method = $("#ajaxEditForm").attr('method');
      // console.log(url);
      // console.log(method);

      $.ajax({
        url: url,
        method: method,
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);

          $(".em").each(function() {
            $(this).html('');
          })

          if (data == "success") {
            location.reload();
          }

          // if error occurs
          else if(typeof data.error != 'undefined') {
            for (let x in data) {
              console.log(x);
              if (x == 'error') {
                continue;
              }
              document.getElementById('eerr'+x).innerHTML = data[x][0];
            }
          }
        }
      });
    });
    /* ***************************************************
    ==========Form Update with AJAX Request End==========
    ******************************************************/



    /* ***************************************************
    ==========Delete Using AJAX Request Start==========
    ******************************************************/
    $('.deletebtn').on('click', function(e) {
      e.preventDefault();
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        buttons:{
          confirm: {
            text : 'Yes, delete it!',
            className : 'btn btn-primary'
          },
          cancel: {
            visible: true,
            className: 'btn btn-danger'
          }
        }
      }).then((Delete) => {
        if (Delete) {
          $(this).parent(".deleteform").submit();
        } else {
          swal.close();
        }
      });
    });
    /* ***************************************************
    ==========Delete Using AJAX Request End==========
    ******************************************************/

    /* ***************************************************
    ==========submit Using AJAX Request Start==========
    ******************************************************/
    $('.subbtn').on('click', function(e) {
      e.preventDefault();
      swal({
        title: 'Are you sure?',
        text: "",
        type: 'warning',
        buttons:{
          confirm: {
            text : 'Yes, do it!',
            className : 'btn btn-primary'
          },
          cancel: {
            visible: true,
            className: 'btn btn-danger'
          }
        }
      }).then((Delete) => {
        if (Delete) {
          $(this).parent(".subform").submit();
        } else {
          swal.close();
        }
      });
    });
    /* ***************************************************
    ==========submit Using AJAX Request End==========
    ******************************************************/
});

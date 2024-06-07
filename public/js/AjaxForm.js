// Form Submit with AJAX Request Start
$("#ajaxForm").on('submit', function (e) {
    e.preventDefault();
    let btn = $("#submitBtn");
    let inputName = btn.attr('data-nameOfArray');
    $(btn).attr('disabled', true);
    let url = $("#ajaxForm").attr('action');
    let method = $("#ajaxForm").attr('method');
    var ajaxForm = document.getElementById('ajaxForm');
    let data = new FormData(ajaxForm);
    var DataArray = {};
    $(".translate input").each(function () {
        var input = $(this);
        var key = input.attr('lang');
        var value = input.val();
        DataArray[key] = value;

    });
    data.set(inputName, JSON.stringify(DataArray));
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url: url,
        method: method,
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            swal({
                position: 'top-end',
                icon: 'success',
                title: response.message,
                showConfirmButton: false,
                // timer: 1500
            }).then(function () {
                if (response.url) {
                    window.location.replace(response.url);

                } else {
                    location.reload();

                }
            });
        },
        error: function (response) {
            // handle errors here
            $(e.target).attr('disabled', false);
            $("#submitBtn").removeAttr('disabled');
            if (!response.responseJSON.success) {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.responseJSON.message,
                    showConfirmButton: false,
                    // timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
            let errors = response.responseJSON.errors;
            console.log(errors);
            $.each(errors, function (field_name, error) {
                $(document).find('[name=' + field_name + ']').after('<span class="text-strong text-danger">' + error + '</span>')
            });
        }
    });
});
// Form Submit with AJAX Request End

// Add input to form
$("#addInput").on("click", function () {
    var title = $('.langTitle').val();
    var lang = $('#languages').find(":selected").val();
    var langText = $("#languages option:selected").text();
    // var lagCode = $('.langCode').val();
    let inputs = `
    <div class="form-group translate">
    <label for="Title" class="col-form-label">Title in ${langText} language</label>
    <input type="text" lang="${lang}" class="form-control"
        id="Title" value="${title}" name="Title">
    </div>
    `
    $("#newlang").append(inputs);
    $(".langModal input").val("");
    $("#languages option:selected").remove();
    if ($('#languages').children('option').length == 0) {
        $('.langBtn').attr('disabled', true)
    }

});

// sending Ajax to delete
$(document).on('click', '.deleteBtn', function () {
    var url = this.id; // contain the full url
    $(document).ajaxStart(function () {
        $("#preloader").css("display", "block")
    });
    $(document).ajaxComplete(function () {
        $("#preloader").css("display", "none");
    });

    swal({
        title: 'Are you sure to delete?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: url,
                dataType: 'json',
                success: function (result) {
                    if (result.success) {
                        swal({
                            title: result.message,
                            icon: 'success',
                            type: "success"
                        }, ).then(function () {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: result.message,
                            icon: 'error',
                            type: "error"
                        }, ).then(function () {
                            location.reload();
                        })
                    }
                },

            }); // end ajax
        }
    })

});


// sending Ajax to delete
$(document).on('click', '.suspendAccount', function () {
    var url = this.id; // contain the full url
    $(document).ajaxStart(function () {
        $("#preloader").css("display", "block")
    });
    $(document).ajaxComplete(function () {
        $("#preloader").css("display", "none");
    });

    swal({
        title: 'Are you sure to Suspend this Account?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((confirm) => {
        if (confirm) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function (result) {
                    if (result.success) {
                        swal({
                            title: result.message,
                            icon: 'success',
                            type: "success"
                        }, ).then(function () {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: result.message,
                            icon: 'error',
                            type: "error"
                        }, ).then(function () {
                            location.reload();
                        })
                    }
                },

            }); // end ajax
        }
    })

});


//  to add  the parent id if we need sub service
$('#NewServiceModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var serviceId = button.data('category-id'); // Extract record ID from data-* attributes
    var modal = $(this);
    modal.find('input[name="parent_id"]').val(serviceId); // Set hidden input value if record ID is passed
})



$("#addAboutInput").on("click", function () {
    var title = $('.langTitle').val();
    var subTitle = $('.langSubTitle').val();
    var description = $('.langDescription').val();
    var lang = $('#languages').find(":selected").val();
    var langText = $("#languages option:selected").text();
    // var lagCode = $('.langCode').val();
    let inputs = `
        <div class="form-group titleTranslate">
        <label for="Title" class="col-form-label">Title in ${langText} language</label>
        <input type="text" lang="${lang}" class="form-control"
            id="Title" value="${title}" name="main_title">
        </div>
        <div class="form-group subTitleTranslate">
        <label for="sub_title" class="col-form-label">Sub Title in ${langText} language</label>
        <input type="text" value="${subTitle}" lang="${lang}" class="sub_title form-control" name="sub_title"
            required>
            </div>
    <div class="form-group descriptionTranslate">
    <label for="description" class="col-form-label">Description in ${langText} language</label>
    <textarea  lang="${lang}" class="langDescription form-control" required name="description" lang="en" id="description" cols="30" rows="10">${description}</textarea>
    </div>`
    $("#newlang").append(inputs);
    $(".langModal input").val("");
    $("#languages option:selected").remove();
    if ($('#languages').children('option').length == 0) {
        $('.langBtn').attr('disabled', true)
    }

});
// Form Submit with AJAX Request Start
$("#aboutAjaxForm").on('submit', function (e) {
    e.preventDefault();
    let btn = $("#submitBtn");
    $(btn).attr('disabled', true);
    let url = $(this).attr('action');
    let method = $(this).attr('method');
    var ajaxForm = document.getElementById('aboutAjaxForm');
    let data = new FormData(ajaxForm);
    var TitleArray = {};
    var SubTitleArray = {};
    var DescriptionArray = {};
    $(".titleTranslate input").each(function () {
        var input = $(this);
        var key = input.attr('lang');
        var value = input.val();
        TitleArray[key] = value;

    });
    $(".subTitleTranslate input").each(function () {
        var input = $(this);
        var key = input.attr('lang');
        var value = input.val();
        SubTitleArray[key] = value;

    });
    $(".descriptionTranslate textarea").each(function () {
        var input = $(this);
        var key = input.attr('lang');
        var value = input.val();
        DescriptionArray[key] = value;

    });

    data.set('main_title', JSON.stringify(TitleArray));
    data.set('sub_title', JSON.stringify(SubTitleArray));
    data.set('description', JSON.stringify(DescriptionArray));
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url: url,
        method: method,
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            swal({
                position: 'top-end',
                icon: 'success',
                title: response.message,
                showConfirmButton: false,
                // timer: 1500
            }).then(function () {
                if (response.url) {
                    window.location.replace(response.url);

                } else {
                    location.reload();

                }
            });
        },
        error: function (response) {
            // handle errors here
            $(e.target).attr('disabled', false);
            $("#submitBtn").removeAttr('disabled');
            if (!response.responseJSON.success) {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.responseJSON.message,
                    showConfirmButton: false,
                    // timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
            let errors = response.responseJSON.errors;
            console.log(errors);
            $.each(errors, function (field_name, error) {
                $(document).find('[name=' + field_name + ']').after('<span class="text-strong text-danger">' + error + '</span>')
            });
        }
    });
});
// Form Submit with AJAX Request End


// ajax service
$("#categoryAjaxForm").on('submit', function (e) {
    e.preventDefault();
    let btn = $("#submitBtn");
    $(btn).attr('disabled', true);
    let url = $(this).attr('action');
    let method = $(this).attr('method');
    var ajaxForm = document.getElementById('categoryAjaxForm');
    let data = new FormData(ajaxForm);
    var TitleArray = {};
    var SubTitleArray = {};
    var DescriptionArray = {};

    TitleArray = getTranslations("titleTranslate");
    DescriptionArray = getTranslations("descriptionTranslate");

    data.set('title', JSON.stringify(TitleArray));
    data.set('description', JSON.stringify(DescriptionArray));

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url: url,
        method: method,
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            swal({
                position: 'top-end',
                icon: 'success',
                title: response.message,
                showConfirmButton: false,
                // timer: 1500
            }).then(function () {
                if (response.url) {
                    window.location.replace(response.url);

                } else {
                    location.reload();

                }
            });
        },
        error: function (response) {
            // handle errors here
            $(e.target).attr('disabled', false);
            $("#submitBtn").removeAttr('disabled');
            if (!response.responseJSON.success) {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.responseJSON.message,
                    showConfirmButton: false,
                    // timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
            let errors = response.responseJSON.errors;
            console.log(errors);
            $.each(errors, function (field_name, error) {
                $(document).find('[name=' + field_name + ']').after('<span class="text-strong text-danger">' + error + '</span>')
            });
        }
    });
});


$("#addServiceInput").on("click", function () {
    var title = $('.langTitle').val();
    var description = $('.langDescription').val();
    var lang = $('#languages').find(":selected").val();
    var langText = $("#languages option:selected").text();
    // var lagCode = $('.langCode').val();
    let inputs = `
        <div class="form-group titleTranslate">
        <label for="Title" class="col-form-label">Title in ${langText} language</label>
        <input type="text" lang="${lang}" class="form-control"
            id="Title" value="${title}" name="main_title">
        </div>
    <div class="form-group descriptionTranslate">
    <label for="description" class="col-form-label">Description in ${langText} language</label>
    <textarea  lang="${lang}" class="langDescription form-control" required name="description" lang="en" id="description" cols="30" rows="10">${description}</textarea>
    </div>`
    $("#newlang").append(inputs);
    $(".langModal input").val("");
    $(".langModal textarea").val("");
    $("#languages option:selected").remove();
    if ($('#languages').children('option').length == 0) {
        $('.langBtn').attr('disabled', true)
    }

});

function getTranslations(translationNodeClass){
    let res = [];

    $(`.${translationNodeClass}`).each(function () {
        var input = $(this);
        var key = input.attr('lang');
        var value = input.val();
        res[key] = value;
    });

    return res;
}

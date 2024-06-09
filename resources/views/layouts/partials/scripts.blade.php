<!--   Core JS Files   -->
<!-- <script src="/js/core/jquery.3.2.1.min.js"></script>
 -->
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>





<!-- jQuery Scrollbar -->
<script src="/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Sweet Alert -->
<script src="/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Tag Input -->
<script src="/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap Datepicker -->
<script src="/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<!-- Dropzone JS -->
<script src="/js/plugin/dropzone/jquery.dropzone.min.js"></script>

<!-- DM Uploader JS -->
<script src="/js/plugin/jquery.dm-uploader/jquery.dm-uploader.min.js"></script>

<!-- NIC Edit JS -->
<script src="/js/plugin/nicEdit/nicEdit.js"></script>

<!-- JS color JS -->
<script src="/js/plugin/jscolor/jscolor.js"></script>

<!-- Atlantis JS -->
<script src="/js/atlantis.min.js"></script>

<!-- Fontawesome Icon Picker JS -->
<script src="/js/plugin/fontawesome-iconpicker/fontawesome-iconpicker.min.js"></script>


<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

<!-- Custom JS -->
<script src="/js/custom.js"></script>

@yield('scripts')
@stack('script-stack')

@if (session()->has('success'))
<script>
  var content = {};

  content.message = '{{session('success')}}';
  content.title = 'Success';
  content.icon = 'fa fa-bell';

  $.notify(content,{
    type: 'success',
    placement: {
      from: 'top',
      align: 'right'
    },
    showProgressbar: true,
    time: 1000,
    delay: 4000,
  });
</script>
@endif


@if (session()->has('warning'))
<script>
  var content = {};

  content.message = '{{session('warning')}}';
  content.title = 'Warning!';
  content.icon = 'fa fa-bell';

  $.notify(content,{
    type: 'warning',
    placement: {
      from: 'top',
      align: 'right'
    },
    showProgressbar: true,
    time: 1000,
    delay: 4000,
  });
</script>
@endif

<!-- Fonts and icons -->
<script src="/js/plugin/webfont/webfont.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  WebFont.load({
    google: {"families":["Lato:300,400,700,900"]},
    custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/css/fonts.min.css']},
    active: function() {
      sessionStorage.fonts = true;
    }
  });
</script>

<!-- CSS Files -->
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="/css/fontawesome-iconpicker.min.css">
<link rel="stylesheet" href="/css/dropzone.css">
<link rel="stylesheet" href="/css/jquery.dm-uploader.min.css">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="/css/atlantis.min.css?ver=1.1">
<link rel="stylesheet" href="/css/custom.css">
<link rel ="stylesheet" href="/css/userStyle.css?ver=1.9">



@yield('styles')

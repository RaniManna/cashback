<!DOCTYPE html>

<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="icon" href="/img/logo.jpg">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
	</script>

	<link rel="icon" href="{{asset('assets/front/img/favicon.jpg')}}">

	@includeif('layouts.partials.styles')

	@yield('styles')

</head>

<body data-background-color="#fff">

	<div class="wrapper">



    {{-- top navbar area start --}}

    @includeif('layouts.partials.top-navbar')

    {{-- top navbar area end --}}





    {{-- side navbar area start --}}

    @includeif('layouts.partials.side-navbar')

    {{-- side navbar area end --}}





		<div class="main-panel">

			<div class="content">

        <div class="page-inner">

          @yield('content')

        </div>

			</div>

      @includeif('layouts.partials.footer')

		</div>



	</div>



	@includeif('layouts.partials.scripts')

	@yield('styles')

</body>

</html>


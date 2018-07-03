<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>
<body>
{{--<div id="throbber" style="display:none; min-height:120px;"></div>--}}
{{--<div id="noty-holder"></div>--}}
<div id="wrapper">

    @include('partials.navbar')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                @yield('content')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    @include('partials.footer')

</div><!-- /#wrapper -->

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/parsley.min.js') }}"></script>
<script src="{{ asset('/js/flow.js') }}"></script>
<script src="{{ asset('/js/summernote.min.js') }}"></script>
<script>
    $('#summernote').summernote({
        width: 600,
        height:100, //set editable area's height
        toolbar:[//[groupName,[list of button]]]
        ['style',['bold','italic','underline']]]
    });
</script>

@yield("scripts")

</body>
</html>
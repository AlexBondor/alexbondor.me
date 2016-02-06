<!DOCTYPE html>
<html>
<head>
    <title>alexbondor</title>

    <meta charset="UTF-8">
    <meta name="application-name" content="alexbondor.me">
    <meta name="description" content="My personal website which contains cool stuff that I do every now and then. Details
    about personal hardware and software projects can be found here.">
    <meta name="keywords" content="arduino, robots, software, computer, computer sciences, engineer,
    software development, electronics, microcontroller, personal website, grouptickets.nl, linkedin, facebook,
    profile, product development">
    <meta name="author" content="Alex Bondor">

    <link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div id="left">
        <div class="name vertical-text">Alex Bondor</div>
        <div class="v-title vertical-text">Computer Scientist</div>
        {{--<div class="subtitle center-text">Doer | Creator | Persuader</div>--}}
    </div>
    <div id="right" class="col-xs-10">
        <div class="row title">
            <div class="col-xs-3">
                <a id="projects" href="/" class="link subtitle">
                    >_ projects
                </a>
            </div>
            <div class="col-xs-3">
                <a id="thoughts" href="/thoughts" class="link subtitle">
                    >_ thoughts
                </a>
            </div>
            <div class="col-xs-3">
                <a href="https://github.com/AlexBondor" class="link subtitle" target="_blank">
                    >_ github
                </a>
            </div>
            <div class="col-xs-3">
                <a href="https://www.linkedin.com/in/alexandrubondor" class="link subtitle" target="_blank">
                    >_ linkedin
                </a>
            </div>
        </div>
        <br>

        @yield('content')
        <div class="row">
            <div class="col-md-9">
                @yield('content-left')
            </div>
            <div class="col-md-3">
                <canvas id='snake' class='game-box'></canvas>
                @yield('content-right')
            </div>
        </div>
    </div>
</div>

</body>
<script src="{{ asset('/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/dropzone.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ asset('/games/snake.js') }}"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-63171754-2', 'auto');
    ga('send', 'pageview');

    $(document).ready(function () {
        var path = location.pathname;
        if (path == "/") {
            $("#thoughts").removeClass("link-active");
            $("#projects").addClass("link-active");
        }
        else {
            $("#projects").removeClass("link-active");
            $("#thoughts").addClass("link-active");
        }
    });
</script>
@yield('script')
</html>

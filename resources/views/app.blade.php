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
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
</head>
<body>

@yield('content')

</body>
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

</script>
</html>

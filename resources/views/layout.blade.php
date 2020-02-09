<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Theming - Semantic</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/Semantic-UI-CSS-master/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

</head>

<body>
    <div class="ui menu">
        <div class="header item"><a href="{{ route('TradeRequestsShowOngoing') }}">MarketPlace</a></div>
        <div class="right menu">
            <a href="{{ route('CreateTradeRequest') }}" class="item">Create Trade Request</a>
        </div>
    </div>

    @yield ('content')

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{ asset('/Semantic-UI-CSS-master/semantic.min.js') }}"></script>

    <script>var whTooltips = {colorLinks: false, iconizeLinks: true, renameLinks: true, iconSize: true};</script>
    <script src="https://wow.zamimg.com/widgets/power.js"></script>

    @yield ('js')
</body>
</html>

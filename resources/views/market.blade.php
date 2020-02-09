@extends ('layout')

@section ('content')
    <div class="ui container">
        <div class="ui two column doubling grid">

            <div class="column custom_scroll_container">
                <div class="ui grid container">

                    <div class="row">
                        <div class="column">
                            <h1 class="ui header">Offres</h1>
                            @foreach($tradeRequests as $tradeRequest)
                                @if ($tradeRequest->state === \App\TradeRequest::STATE_ON_GOING && $tradeRequest->tradeType === \App\TradeRequest::TRADE_TYPE_OFFER)
                                <div class="ui one column grid">
                                    <div class="column">
                                        <table class="ui table">
                                            <thead>
                                            <tr>
                                                <th>{{ $tradeRequest->customer }}</th>
                                                <th class="custom_text_align_right">
                                                    <i class="close icon red" data-trigger="delete" data-target="/delete/{{ $tradeRequest->id }}"></i>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $tradeRequest->comment }}</td>
                                                </tr>
                                                @foreach($tradeRequest->tradeObjects->all() as $tradeObject)
                                                <tr>
                                                    <td><a href="https://fr.wowhead.com/item={{ $tradeObject->wowhead_id }}" data-wowhead="item={{ $tradeObject->wowhead_id }}" data-wh-icon-size="small"></a></td>
                                                    <td class="custom_text_align_right">{{ $tradeObject->wowhead_id }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="column custom_scroll_container">
                <div class="ui grid container">
                    <div class="row">
                        <div class="column">
                            <h1 class="ui header">Demandes</h1>
                            @foreach($tradeRequests as $tradeRequest)
                                @if ($tradeRequest->state === \App\TradeRequest::STATE_ON_GOING && $tradeRequest->tradeType === \App\TradeRequest::TRADE_TYPE_DEMAND)
                                <div class="ui one column grid">
                                    <div class="column">
                                        <table class="ui table">
                                            <thead>
                                            <tr>
                                                <th>{{ $tradeRequest->customer }}</th>
                                                <th class="custom_text_align_right">
                                                    <i class="close icon red" data-trigger="delete" data-target="/delete/{{ $tradeRequest->id }}"></i>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $tradeRequest->comment }}</td>
                                                </tr>
                                                @foreach($tradeRequest->tradeObjects->all() as $tradeObject)
                                                <tr>
                                                    <td><a href="https://fr.wowhead.com/item={{ $tradeObject->wowhead_id }}" data-wowhead="item={{ $tradeObject->wowhead_id }}" data-wh-icon-size="small"></a></td>
                                                    <td class="custom_text_align_right">{{ $tradeObject->wowhead_id }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="trash icon"></i>
        </div>
        <div class="content">
            <p>Etes vous sur de vouloir supprimer cet élement ?</p>
        </div>
        <div class="actions">
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                No
            </div>
            <div class="ui green ok inverted button" data-trigger="validate">
                <i class="checkmark icon"></i>
                Yes
            </div>
        </div>
    </div>

@endsection

@section ('js')
    <script type="text/javascript" src="{{ asset('js/marketActions.js') }}"></script>
@endsection

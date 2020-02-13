@extends ('layout')

@section ('content')
    <div class="ui container">
        <h2 class="ui dividing header">Création de transaction<a class="anchor" id="form-variations"></a></h2>

        <form id="mainForm" class="ui form" data-type="main_form" action="{{ route('StoreTradeRequest') }}" method="post">
            @csrf

            <div class="equal width fields">
                <div class="field">
                    <label>Customer Name</label>
                    <input type="text" name="customer" placeholder="Ex: Jean-Michel">
                </div>
                <div class="field">
                    <label for="selectTradeType">Type</label>
                    <select id="selectTradeType" name="tradeType" form="mainForm">
                        <option value="demand">Demand</option>
                        <option value="offer">Offer</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <label>Comment</label>
                <textarea name="comment"></textarea>
            </div>

            <div class="field">
                <h4 class="ui header">Objects</h4>
            </div>

            <div class="field" data-type="object_field">
                <div class="inline field custom_form_object" data-type="base_object">
                    <input type="number" class="trade-object" name="tradeObject_wowhead_id[]" placeholder="Wowhead id">
                    <input type="number" class="trade-object" name="tradeObject_quantity[]" placeholder="Quantity">
                </div>
            </div>

            <div class="field">
                <div class="ui message">
                    <p><a href="{{ asset('/img/help.png') }}" target="_blank" class="ui blue button">?</a> Use WowHead object Id. </p>
                </div>
            </div>

            <button class="ui button" data-trigger="add_form_object">
                <i class="plus icon"></i>
                Ajouter objet
            </button>
            <button class="ui active button" type="submit">Submit</button>
        </form>
    </div>

@endsection

@section ('js')
    <script type="text/javascript" src="{{ asset('js/dynamicFieldsTradeObject.js') }}"></script>
@endsection

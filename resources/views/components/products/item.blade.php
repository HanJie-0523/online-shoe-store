<div class="p-2">
    <div class="row" style="height:25em;width:25em">
        <img src="{{ asset('storage/' . $item['image']) }}" style="width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;">
    </div>
    <div>
        <h6>{{ $item['name'] }}</h6>
    </div>
    <div>
        RM{{ $item['price'] }}
    </div>
</div>

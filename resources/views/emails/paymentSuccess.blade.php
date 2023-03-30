<x-mail::message>
# Payment Success!

{{$order->user->name}}. Thank you for your purchasing.
Amount: RM {{$order->amount}}

<x-mail::button :url="''">
Track
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

@component('mail::message')
#Purchase Confirmation

Thanks for making a purchase! Here's the details of your order:

- Name : {{ $purchase->name }}
- Email : {{ $purchase->email }}

## Items :
@foreach(json_decode($purchase->items) as $id=>$quantity)
- {{ \App\Models\Item::find($id)->name }} **x{{$quantity}}**
@endforeach

@endcomponent
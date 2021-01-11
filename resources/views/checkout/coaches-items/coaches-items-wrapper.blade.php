{{-- All the coaches selected for checkout --}}
<ul>
    @for ($i = 0; $i < $count=2; $i++)
        @include('checkout.coaches-items.item')
    @endfor
</ul>
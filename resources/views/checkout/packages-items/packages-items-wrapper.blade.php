{{-- All the Packages selected for checkout --}}
<ul>
    @for ($i = 0; $i < $count=2; $i++)
        @include('checkout.packages-items.item')
    @endfor
</ul>
@extends('layouts.app')
@section('content')

    @push('livewire-style')
        @livewireStyles
        <style>

            .cart-table td.pro-quantity .pro-qty2 {
                max-width: 120px;
                height: 50px;
                border: 1px solid var(--color-border);
                border-radius: 6px;
                padding: 0;
                display: flex;
                margin: auto;
                min-width: 50px;
                align-items: center;
            }
        </style>
    @endpush

@section('content')
    @livewire('cart',[ 'carts'=>$carts])
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>

    @push('livewire-script')
        @livewireScripts
    @endpush
@endsection

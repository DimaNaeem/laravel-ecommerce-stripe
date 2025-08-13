<x-app-layout>
   <x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Your Cart</h2>
        <a href="{{ route('products.index') }}"
           class="inline-flex items-center px-3 py-2 rounded-md bg-gray-100 hover:bg-gray-200 text-gray-800">
            ← Continue shopping
        </a>
    </div>
</x-slot>


    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('status') }}</div>
            @endif

            @if (empty($cart))s
                <div class="bg-white p-6 rounded shadow">Your cart is empty.</div>

 <a href="{{ route('products.index') }}" class="inline-block mt-3 text-indigo-600 hover:text-indigo-700">
            ← Browse products
        </a>
    </div>


                
            @else
                <div class="bg-white p-4 rounded shadow space-y-4">
                    @foreach ($cart as $item)
                        <div class="flex items-center gap-4 border-b pb-4">
                            <img src="{{ asset('images/'.$item['image']) }}" class="w-20 h-20 object-cover rounded" alt="">
                            <div class="flex-1">
                                <div class="font-semibold">{{ $item['name'] }}</div>
                                <div class="text-sm text-gray-600">${{ number_format($item['price'], 2) }}</div>
                                <form method="POST" action="{{ route('cart.update', $item['id']) }}" class="mt-2 flex items-center gap-2">
                                    @csrf
                                    <input type="number" name="qty" min="1" value="{{ $item['qty'] }}" class="w-20 border rounded px-2 py-1">
                                    <button class="px-3 py-1 rounded bg-gray-800 text-Green">Update</button>
                                </form>
                            </div>
                            <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                @csrf
                                <button class="px-3 py-2 bg-red-600 text-Green rounded">Remove</button>
                            </form>
                        </div>
                    @endforeach
                    <div class="flex items-center justify-between pt-4">
                        <div class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</div>
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('cart.clear') }}">
                                @csrf
                                <button class="px-3 py-2 bg-gray-200 rounded">Clear Cart</button>
                            </form>
                            <a href="{{ route('checkout.show') }}" class="px-4 py-2 bg-indigo-600 text-Green rounded">
                                 Checkout
                            </a>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

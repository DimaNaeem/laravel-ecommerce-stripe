<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Checkout</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if (empty($cart))
                    <div>Your cart is empty.</div>
                    <a href="{{ route('products.index') }}" class="inline-block mt-3 text-indigo-600 hover:text-indigo-700">
                        ← Continue shopping
                    </a>
                @else
                    <h3 class="font-semibold mb-4">Order Summary</h3>
                    <div class="space-y-2">
                        @foreach ($cart as $item)
                            <div class="flex justify-between text-sm">
                                <span>{{ $item['name'] }} × {{ $item['qty'] }}</span>
                                <span>${{ number_format($item['price'] * $item['qty'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-lg font-bold">Total: ${{ number_format($total, 2) }}</div>
                        <form action="{{ route('checkout.create') }}" method="POST">
                            @csrf
                            <button class="px-4 py-2 rounded-md bg-indigo-600 text-Green hover:bg-indigo-700">
                                Pay with card (Stripe test)
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

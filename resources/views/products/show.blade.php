<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                    <img src="{{ asset('images/'.$product->image) }}"
                         alt="{{ $product->name }}" class="w-full h-96 object-cover">

                    <div class="p-6 md:p-8">
                        <a href="{{ route('products.index') }}" class="text-sm text-gray-500 hover:underline">← Back to Products</a>

                        <h1 class="mt-2 text-2xl font-semibold">{{ $product->name }}</h1>
                        <div class="mt-2 text-xl font-bold">${{ number_format($product->price, 2) }}</div>

                        <p class="mt-4 text-gray-700 leading-relaxed">
                            {{ $product->description }}
                        </p>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-6">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 rounded-md bg-indigo-600 text-Green hover:bg-indigo-700">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

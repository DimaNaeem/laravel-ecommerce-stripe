<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $p)
                    <div class="bg-white shadow-sm rounded-xl">
                    <a href="{{ route('products.show', $p->id) }}">
                        <img src="{{ asset('images/'.$p->image) }}"
                             alt="{{ $p->name }}"
                             class="w-full h-56 object-cover rounded-t-xl">
                    </a>
                        <div class="p-4">
            <a href="{{ route('products.show', $p->id) }}">

                            <h3 class="font-semibold">{{ $p->name }}</h3>
</a>
                            <p class="text-sm text-gray-600">{{ $p->description }}</p>
                            <div class="mt-2 font-bold">${{ number_format($p->price, 2) }}</div>

                            {{-- ADD TO CART --}}
                           
    
          <form action="{{ route('cart.add', $p->id) }}" method="POST" class="mt-4">
    @csrf
    <button type="submit"
            class="px-4 py-2 rounded-md bg-indigo-600 text-Green hover:bg-indigo-700">
        Add to Cart
    </button>
</form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

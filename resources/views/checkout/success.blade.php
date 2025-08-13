<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payment Successful</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow text-center">
                <div class="text-2xl font-semibold mb-2">🎉 Thank you!</div>
                <p>Your payment was processed successfully.</p>
                <a href="{{ route('products.index') }}"
                   class="inline-block mt-4 px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200">
                    Continue shopping
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

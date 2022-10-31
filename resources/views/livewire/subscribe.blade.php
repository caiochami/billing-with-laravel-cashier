<div class="p-2 flex flex-col gap-2" x-data="subscribe(@js($intent), @js(env('STRIPE_KEY')), @js($user->name))">
    <fieldset>
        @foreach ($products as $product)
            <legend class="sr-only">{{ $product['name'] }}</legend>

            <div class="space-y-5">
                @foreach ($product['prices'] as $price)
                    <div class="relative flex items-start">
                        <div class="flex h-5 items-center">
                            <input wire:model="priceId" id="{{ $price['price_id'] }}" value="{{ $price['price_id'] }}"
                                aria-describedby="{{ $price['price_id'] }}" name="{{ $price['price_id'] }}"
                                type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="{{ $price['price_id'] }}" class="font-medium text-gray-700">
                                {{ $price['name'] }}
                            </label>
                            <p id="{{ $price['price_id'] }}" class="text-gray-500">{{ $price['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </fieldset>

    <div class="border p-2 rounded-md" id="card-element"></div>

    <div class="text-red-500" id="card-errors" role="alert"></div>

    <div class="flex justify-center">
        <x-jet-button @click="subscribe">Subscribe</x-jet-button>
    </div>
</div>

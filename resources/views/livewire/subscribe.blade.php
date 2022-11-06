<div class="p-2 flex flex-col gap-2">
    <fieldset>
        @foreach ($products as $product)
            <legend class="sr-only">{{ $product['name'] }}</legend>

            <div class="space-y-5">
                @foreach ($product['prices'] as $price)
                    <div class="relative flex items-start">
                        <div class="flex h-5 items-center">
                            <x-radio id="{{ $price['price_id'] }}" value="{{ $price['price_id'] }}"
                                wire:model.defer="priceId" />
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

    <div class="flex justify-center" x-data="subscribe(@js($intent), @js(env('STRIPE_KEY')), @js($user->name))">
        <x-jet-button @click="subscribe">@lang('Subscribe')</x-jet-button>
    </div>
</div>

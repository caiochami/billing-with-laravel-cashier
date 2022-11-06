<div class="p-2 flex flex-col gap-2">
    <fieldset>

        Products go here

    </fieldset>

    <div class="border p-2 rounded-md" id="card-element"></div>

    <div class="text-red-500" id="card-errors" role="alert"></div>

    <div class="flex justify-center" x-data="charge(@js(env('STRIPE_KEY')), @js($user->name))">
        <x-jet-button @click="charge" wire:loading.attr="disabled">
            <x-icon.spinner class="w-5 h-5 mr-2" wire:loading />
            @lang('Charge')
        </x-jet-button>
    </div>
</div>

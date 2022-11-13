<x-table>
    <x-slot name="headers">
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                Date
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                $
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                Actions
            </th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($invoices as $invoice)
            <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">Lindsay
                    {{ $invoice->date()->toFormattedDateString() }}
                </td>

                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                    {{ $invoice->total() }}
                </td>

                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                    <x-button icon="download" label="Download"
                        wire:click="$emit('downloadInvoice', '{{ $invoice->id }}')" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>

@props(['body', 'headers'])

<div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
            {{ $headers }}
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">

            {{ $body }}

        </tbody>
    </table>
</div>

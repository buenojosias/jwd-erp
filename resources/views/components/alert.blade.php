@props(['label'])

<div class="rounded-md bg-green-50 p-4 shadow">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-icon name="check-circle" class="w-5 h-5 text-green-600" solid />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-green-800">{{ $label }}</p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <x-button flat positive icon="x" />
            </div>
        </div>
    </div>
</div>

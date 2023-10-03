<div
    x-data="{ activeAd: window.innerWidth > 768 ? {{ $ads->items()[0]->id }} : null,selectedPreview: window.innerWidth > 768 ? {{ $ads->items()[0]->id }} : null }"
    class="grid grid-cols-1 gap-2 md:max-w-7xl md:grid-flow-col-dense md:grid-cols-3">
    <div
        class="max-h-screen overflow-y-hidden sm:overflow-y-auto space-y-6 md:col-start-1 sm:overflow-hidden p-1">
        @foreach($ads->items() as $ad)
            <livewire:ads-preview :ad="$ad" :image="$image"/>
        @endforeach
        {{ $ads->links() }}
    </div>

    <livewire:ads-content :ads="$ads" :image="$image"/>
</div>

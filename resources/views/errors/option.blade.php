<x-app-layout>
    <div class="section">
        <div class="columns">
            <div class="column is-6 box is-offset-3">
                @if(blank(optional($option)->message))
                    <h1 class="title">{{ $message }}</h1>
                @else
                    <h1 class="title">{{ optional($option)->message }}</h1>
                @endif
                <p>Kami berupaya memperbaiki ini sesegera mungkin.</p>
            </div>
        </div>
    </div>
</x-app-layout>

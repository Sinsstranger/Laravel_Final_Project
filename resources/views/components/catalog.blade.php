<div class="properties_grid">
    @forelse($properties as $property)
        <x-catalog_card :property="$property"/>
    @empty
        Нет подходящих объектов недвижимости.
    @endforelse
</div>

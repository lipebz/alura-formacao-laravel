<ul class="list-group">
    @foreach ($data as $item)
        <li class="list-group-item">{{ $item->$value }}</li>
    @endforeach
</ul>
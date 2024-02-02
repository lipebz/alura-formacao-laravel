<ul class="list-group">
    @foreach ($data as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('series.seasons.index', $item->$primary) }}" class="m-0">{{ $item->$value }}</a>
            <div class="list-actions d-flex column-gap-3">
                <form action="{{ route('series.destroy', $item->$primary) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                </form>
                <a href="{{ route('series.edit', $item->$primary) }}" class="btn btn-sm btn-primary">Editar</a>
            </div>
        </li>
    @endforeach
</ul>
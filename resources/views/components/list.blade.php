<ul class="list-group">
    @foreach ($data as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <p class="m-0">{{ $item->$value }}</p>
            <div class="list-actions d-flex">
                <form action="{{ route('series.destroy', $item->$primary) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
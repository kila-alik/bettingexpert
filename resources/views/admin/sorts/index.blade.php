<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title">Все види спортов</h4>

    @if(!empty(session('status')))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>Вид</th>
            <th>Имя</th>
            <th>URL адрес(alias)</th>
            <th></th>
        </tr>
        </thead>


        <tbody>

        @foreach($sorts as $sort_item)
            <tr>
                <td><img src="{{ URL::asset('images/'.$sort_item->icon) }}" width="18" alt="{{ $sort_item->name }}" title="{{ $sort_item->name }}"></td>
                <td>{{ $sort_item->name }}</td>
                <td>{{ $sort_item->alias }}</td>
                <td class="text-right">
                    <a href="{{ route('sort.edit', $sort_item->id) }}" class="btn btn-info btn-rounded waves-light waves-effect"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('sort.destroy', $sort_item->id) }}" method="post" class="d-inline-block">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-rounded waves-light waves-effect"><i class="fa fa-remove"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
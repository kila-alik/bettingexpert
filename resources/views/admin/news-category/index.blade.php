<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title">Все категории</h4>

    @if(!empty(session('status')))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>Имя</th>
            <th>URL адрес(alias)</th>
            <th></th>
        </tr>
        </thead>


        <tbody>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->alias }}</td>
                <td class="text-right">
                    <a href="{{ route('news-category.edit', $category->id) }}" class="btn btn-info btn-rounded waves-light waves-effect"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('news-category.destroy', $category->id) }}" method="post" class="d-inline-block">
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
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все новости</h4>
            <p class="text-muted font-14 m-b-30">
                <a href="{{ route('news.create') }}" class="btn btn-primary">Добавить новый</a>
            </p>

            @if(!empty(session('status')))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Картинка</th>
                    <th>Имя</th>
                    <th>Текст</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                @foreach($news as $item)
                    <tr>
                        <td><img src="{{ URL::asset('images/'.$item->image) }}" width="100" alt="{{ $item->title }}" title="{{ $item->title }}"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ str_limit($item->text, 250) }}</td>
                        <td class="text-right">
                            <a href="{{ route('news.edit', $item->id) }}" class="btn btn-info btn-rounded waves-light waves-effect"  title="Редактировать"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('news.destroy', $item->id) }}" method="post" class="d-inline-block">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-rounded btn-block waves-light waves-effect" title="Удалить"><i class="fa fa-remove"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->


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
                    <th>Категория</th>
                    <th>Картинка</th>
                    <th>Имя</th>
                    <th>Текст</th>
                    <th>Время</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                @foreach($news as $item)
                    <tr>
                        <td>{{ $item->category->name }}</td>
                        <td><img src="{{ URL::asset('images/'.$item->image) }}" width="100" alt="{{ $item->title }}" title="{{ $item->title }}"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ str_limit($item->text, 250) }}</td>
                        <td>{{ $item->created_at }}</td>
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
            <ul class="pagination justify-content-end pagination-split mt-0">
                @if($news->lastPage() > 1)

                    @if($news->currentPage() !== 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $news->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    @endif

                    @for($i = max(1, $news->currentPage()-5); $i <= min($news->currentPage() + 5, $news->lastPage()); $i++)
                        <li class="page-item{{ ($i == $news->currentPage()) ? " active" : '' }}"><a href="{{ $news->url($i) }}" class="page-link">{{ $i }}</a></li>

                    @endfor

                    @if($news->lastPage() > $news->currentPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    @endif

                @endif
            </ul>
        </div>
    </div>
</div> <!-- end row -->


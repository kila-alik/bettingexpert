<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все отзывы</h4>
            @if(!empty(session('status')))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table id="datatable" class="table table-bordered" style="table-layout: fixed; ">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Отзыв</th>
                    <th>Скриншот</th>
                    <th>Время</th>
                    <th>Одобренный</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                @foreach($reviews as $item)
                    <tr>
                        <td>
                            <img src="{{ Gravatar::src($item->user->email, 50) }}" class="rounded-circle img-thumbnail" alt="profile-image">
                            <b>{{ $item->user->name }}</b><br />
                            {{ $item->user->email }}
                        </td>
                        <td style="word-wrap: break-word;">{{ str_limit($item->review, 300) }}</td>
                        <td><img src="{{ URL::asset('/images/'.$item->screenshot) }}" width="200" alt=""></td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if($item->confirmed===1)
                                <span class="badge badge-success">ДА</span>
                            @else
                                <span class="badge badge-secondary">НЕТ</span>
                            @endif

                        </td>
                        <td class="text-right">
                            <form action="{{ route('reviews.confirm') }}" method="post" class="d-inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-primary btn-rounded btn-block waves-light waves-effect" title="Одобрить"><i class="fa fa-check"></i></button>
                            </form>
                            <form action="{{ route('reviews.confirm') }}" method="post" class="d-inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" name="submit_cancel" value="1" class="btn btn-warning btn-rounded btn-block waves-light waves-effect" title="Снять"><i class="fa fa-close"></i></button>
                            </form>
                            <form action="{{ route('reviews.destroy', $item->id) }}" method="post" class="d-inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-rounded btn-block waves-light waves-effect" title="Снять">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <ul class="pagination justify-content-end pagination-split mt-0">
            @if($reviews->lastPage() > 1)

                @if($reviews->currentPage() !== 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $reviews->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                @endif

                @for($i = max(1, $reviews->currentPage()-5); $i <= min($reviews->currentPage() + 5, $reviews->lastPage()); $i++)
                    <li class="page-item{{ ($i == $reviews->currentPage()) ? " active" : '' }}"><a href="{{ $reviews->url($i) }}" class="page-link">{{ $i }}</a></li>

                @endfor

                @if($reviews->lastPage() > $reviews->currentPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $reviews->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>

                @endif

            @endif
        </ul>
    </div>
</div> <!-- end row -->


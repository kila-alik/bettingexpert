<div class="row">
    @foreach($users as $user)
    <div class="col-md-3">
        <div class="text-center card-box">

            <div class="member-card pt-2 pb-2">
                <div class="col-md-2 pull-right">
                    <a href="" title="Редактировать"><i class="fa fa-edit"></i></a>
                </div>
                <div class="col-md-1">
                    <b>ID:</b> {{ $user->id }}
                </div>
                <div class="thumb-lg member-thumb m-b-10 mx-auto">
                    <img src="{{ Gravatar::src($user->email, 100) }}" class="rounded-circle img-thumbnail" alt="profile-image">
                </div>

                <div class="">
                    <h4 class="m-b-5">{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email ? $user->email : '&nbsp;' }}</p>
                </div>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-3">
                                <h4 class="m-b-5">{{ $user->payments()->where('fk_intid', '!=', 0)->count() }}</h4>
                                <p class="mb-0 text-muted">Количество покупок</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-3">
                                <h4 class="m-b-5">{{ $user->payments()->where('fk_intid', '!=', 0)->sum('amount') }} ₽</h4>
                                <p class="mb-0 text-muted">Сумма покупок</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> <!-- end col -->
        @endforeach
</div>


<div class="row">
    <div class="col-12">
        <div class="text-right">
            <ul class="pagination justify-content-end pagination-split mt-0">
                @if($users->lastPage() > 1)

                    @if($users->currentPage() !== 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    @endif

                    @for($i = max(1, $users->currentPage()-5); $i <= min($users->currentPage() + 5, $users->lastPage()); $i++)
                        <li class="page-item{{ ($i == $users->currentPage()) ? " active" : '' }}"><a href="{{ $users->url($i) }}" class="page-link">{{ $i }}</a></li>

                    @endfor

                    @if($users->lastPage() > $users->currentPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    @endif

                @endif
            </ul>
        </div>
    </div>
</div>
<!-- end row -->

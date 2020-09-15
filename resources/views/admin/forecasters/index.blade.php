<div id="app">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="pull-right">
                <a href="#" class="btn btn-primary btn-sm" @click="showModal">Добавить пользователь</a>
            </div>
            <a class="btn btn-outline-dark waves-light waves-effect btn-sm active" href="{{ route('forecasters.index') }}"><i class="fa fa-user-circle-o"></i> Прогнозисты</a>
            <a class="btn btn-outline-dark waves-light waves-effect btn-sm" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Пользователи</a>
        </div>
        <user-add-edit-component ref="userAddEdit" v-show="modalShow"></user-add-edit-component>
        @foreach($users as $user)
            <div class="col-md-3">
                <div class="text-center card-box">

                    <div class="member-card pt-2 pb-2">
                        <div class="col-md-2 pull-right">
                            <i class="fa fa-edit edit-component button" title="Редактировать" @click="showModal({{ $user->id }})"></i>
                        </div>
                        <div class="col-md-1">
                            <b>ID:</b> {{ $user->id }}
                        </div>
                        <div class="thumb-lg member-thumb m-b-1 mx-auto">
                            <img src="{{ $user->avatar ? asset('avatars/'.$user->avatar) : Gravatar::src($user->email, 100) }}" class="rounded-circle img-thumbnail" alt="profile-image">
                        </div>

                        <div class="">
                            <h4 class="m-b-5">{{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->email ? $user->email : '&nbsp;' }}</p>
                        </div>

                        <div class="mt-4">
                            <strong>Информация о пользователе։</strong>
                            {{ str_limit($user->information, 15) }}
                        </div>
                        <div class="mt-4 border-top">
                            <strong>Дата регистрации:</strong> {{ $user->created_at }}
                        </div>

                    </div>

                </div>

            </div>
        @endforeach
    </div>
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

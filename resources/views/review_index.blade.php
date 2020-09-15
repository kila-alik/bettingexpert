<section id="testimonials-4col-2row" class="pt-75 pb-125 text-left light">
    <div class="container">
        <div class="container gallery">
            <div class="page-header">
                <h1 id="timeline">Отзывы наших клиентов</h1>
                <a href="#add-review" target="_self" class="smooth btn btn-primary btn-sm">
                    <span style="" class="spr-option-textedit-link"><i class="icon icon-plus-square"></i> Оставить отзыв </span>
                </a>
            </div>
            <ul class="timeline">
                @foreach($reviews as $k=>$review)
                    @if($k % 2 == 0)
                        <li>
                    @else
                        <li class="timeline-inverted">
                    @endif
                            <img src="{{ Gravatar::src($review->user->email, 80) }}" height="30" class="timeline-badge warning avatar" title="{{ $review->user->name }}" alt="{{ $review->user->name }}">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{ ucfirst($review->user->name) }}</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{ $review->created_at->format('Y-m-d H:i') }}</small></p>
                                </div>
                                <div class="timeline-body">
                                    @if($review->screenshot)
                                        <a href="{{ URL::asset('/images/'.$review->screenshot) }}" class="gallery-box gallery-style-4">
                                            <span class="caption"><strong class="word-wrap">{{ $review->review }}</strong></span>
                                            <img src="{{ URL::asset('/images/'.$review->screenshot) }}" class="height-200" alt="screen">
                                        </a>
                                    @endif
                                    <p>
                                        {{ $review->review }}
                                    </p>
                                </div>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>
        @if(count($reviews) < 1)
            <h3>Нет отзывы</h3>
        @endif

        <div class="pagination p13">
            <ul>
                @if($reviews->lastPage() > 1)

                    @if($reviews->currentPage() !== 1)
                        <a href="{{ $reviews->previousPageUrl() }}"><li><</li></a>
                    @endif


                    @for($i = max(1, $reviews->currentPage()-5); $i <= min($reviews->currentPage() + 5, $reviews->lastPage()); $i++)
                        <a href="{{ $reviews->url($i) }}" class="{{ ($i == $reviews->currentPage()) ? "is-active" : '' }}"><li>{{ $i }}</li></a>

                    @endfor

                    @if($reviews->lastPage() > $reviews->currentPage())
                        <a href="{{ $reviews->nextPageUrl() }}"><li>></li></a>
                    @endif

                @endif
            </ul>
        </div>
    </div>
    <hr>
    <div class="container" id="add-review">
        <div class="col-md-6 mb-40">
            <h2 class="">Оставить отзыв</h2>
            <h4 class="mb-50">Вы очень важны для нас,
                <br>оставьте свои отзывы о наших прогнозах.</h4>
        </div>
        <div class="col-md-6 mb-40">
            <form action="{{ route('addReview') }}" method="post" enctype="multipart/form-data" class="contact_form" novalidate="novalidate" id="add-review-form-2-form">
                <div class="form-group">
                    <label for="">Скриншот ставки</label> <input type="file" name="screenshot" class="file-box form-control form-control-file"  @guest disabled="disabled" @endguest>
                </div>
                <div class="form-group">
                    <label for="">Отзыв <span class="text-danger">*</span></label>
                    <textarea @guest disabled="disabled" @endguest class="spr-textarea form-control" rows="3" placeholder="@guestОтзыв может оставить только зарегистрированные пользователи... @elseВаш отзыв... @endguest" name="review" required="required"></textarea>
                </div>
                {{ csrf_field() }}
                <button @guest disabled="disabled" @endguest type="submit" data-loading-text="•••" data-complete-text="Ваш отзыв успешно отправлен на проверку!" data-reset-text="Попробуйте позже..." class="btn btn-block btn-primary"><i class="icon-paper-plane icon-position-left icon-size-m"></i><span class="spr-option-textedit-link">Оставить отзыв</span></button>
            </form>
            @if (count($errors->all()) > 0)
                <div class="alert alert-danger text-center">
                    <strong>{{ $errors->all()[0] }}</strong>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success text-center">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="bg"></div>
</section>
<section id="spec-inner-page" class="pb-125 pt-100 light">
    <div class="container">
        <div class="row">

            <div class="col-md-9">

                @foreach($news as $item)
                <div class="card">
                    <h2><a href="{{ route('newsShow', $item->alias) }}"><strong>{{ $item->title }}</strong></a></h2>
                    <ul class="list-inline desc-text mb-10">
                        <li><i class="icon-calendar-empty icon-position-left"></i>
                            <span class="spr-option-textedit">{{ $item->created_at->format('d.m.Y H:i') }}</span>
                        </li>
                        <li><i class="icon-pickaxe icon-position-left"></i>
                            <span class="spr-option-textedit"><a href="{{ route('news.category', $item->category->alias) }}">{{ $item->category->name }}</a></span>
                        </li>
                    </ul>

                    <img src="{{ URL::asset('/images/'.$item->image) }}" alt="chart" class="screen mb-25">
                    <div class="mb-10">
                        {{ str_limit(strip_tags($item->text), 750) }}
                        <a href="{{ route('newsShow', $item->alias) }}" class="btn btn-light">Читать далее</a>
                    </div>
                </div>
                @endforeach

                    <div class="pagination p12">
                        <ul>
                            @if($news->lastPage() > 1)

                                @if($news->currentPage() !== 1)
                                    <a href="{{ $news->previousPageUrl() }}"><li><</li></a>
                                @endif


                                @for($i = max(1, $news->currentPage()-5); $i <= min($news->currentPage() + 5, $news->lastPage()); $i++)
                                    <a href="{{ $news->url($i) }}" class="{{ ($i == $news->currentPage()) ? "is-active" : '' }}"><li>{{ $i }}</li></a>

                                @endfor

                                @if($news->lastPage() > $news->currentPage())
                                    <a href="{{ $news->nextPageUrl() }}"><li>></li></a>
                                @endif

                            @endif
                        </ul>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="widget border-box padding-box spr-option-copy-del">
                    <p>Свежие новости российского и мирового спорта, фоторепортажи и онлайны-трансляции главных матчей. Футбол, хоккей, баскетбол, теннис, биатлон, бокс, MMA, Formula 1 и другие виды спорта.</p>
                </div>

                <div class="widget">
                    <img class="screen" src="{{ URL::asset('images/news.jpg') }}" alt="banner">
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-group widget border-box padding-box spr-option-copy-del">

                    @foreach($categories as $category)
                    <li class="list-group-item {{ Request::is('news/category/'.$category->alias) ? 'active' : '' }}">
                        <span class="badge">{{ $category->news->count() }}</span>
                        <a href="{{ route('news.category', $category->alias) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>

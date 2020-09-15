<section id="spec-inner-page" class="pb-125 pt-100 light">
    <div class="container">
        <div class="row">

            <div class="col-md-9">


                <div class="card">
                    <h2><strong>{{ $news->title }}</strong></h2>
                    <ul class="list-inline desc-text mb-10">
                        <li><i class="icon-calendar-empty icon-position-left"></i>
                            <span class="spr-option-textedit">{{ $news->created_at->format('d.m.Y H:i') }}</span>
                        </li>
                        <li><i class="icon-pickaxe icon-position-left"></i>
                            <span class="spr-option-textedit"><a href="{{ route('news.category', $news->category->alias) }}">{{ $news->category->name }}</a></span>
                        </li>
                    </ul>

                    <img src="{{ URL::asset('/images/'.$news->image) }}" alt="{{ $news->title }}" title="{{ $news->title }}" class="screen mb-25">
                    <div class="mb-10 news-content">
                        {!! $news->text !!}
                    </div>

                    <ul class="share-list mt-10">
                        <li>
                            <a href="#" class="goodshare" data-social="facebook" data-type="fb"><i class="icon-facebook"></i><span class="spr-option-textedit-link">Share</span><span data-counter="facebook"></span></a>
                        </li>
                        <li>
                            <a href="#" class="goodshare" data-type="tw" data-social="twitter"><i class="icon-twitter"></i><span class="spr-option-textedit-link">Tweet</span><span data-counter="twitter"></span></a>
                        </li>
                        <li>
                            <a href="#" class="goodshare" data-type="gp" data-social="googleplus"><i class="icon-google-plus"></i><span class="spr-option-textedit-link">Share</span><span data-counter="googleplus"></span></a>
                        </li>
                        <li>
                            <a href="#" class="goodshare" data-type="li" data-social="linkedin"><i class="icon-linkedin"></i><span class="spr-option-textedit-link">Share</span><span data-counter="linkedin"></span></a>
                        </li>
                        <li>
                            <a href="#" class="goodshare" data-type="pt" data-social="pinterest"><i class="icon-pinterest-p"></i><span class="spr-option-textedit-link">Share</span><span data-counter="pinterest"></span></a>
                        </li>
                        <li>
                            <a href="#" class="goodshare" data-type="vk" data-social="vkontakte"><i class="icon-vk"></i><span class="spr-option-textedit-link">Share</span><span data-counter="vkontakte"></span></a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-3">
                <div class="widget">
                    <h3><mark>Недавние посты</mark></h3>
                    <hr>

                    <ul class="post-list">
                        @foreach($recent_news as $item)
                        <li class="spr-option-copy-del">
                            <span class="spr-option-textedit"><a href="{{ route('newsShow', $item->alias) }}">{{ $item->title }}</a></span>
                            <ul class="list-inline post-desc">
                                <li><small>{{ $item->created_at->format('d.m.Y H:i') }}</small></li>
                            </ul>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="col-md-3 mt-25">
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
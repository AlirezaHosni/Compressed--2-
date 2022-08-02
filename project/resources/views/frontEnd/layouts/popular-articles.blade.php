<div class="col-12">
    <h2 class="border-bottom">محبوب ترین</h2>
    <ul>
        @foreach($papularArticles as $papularArticle)
            <li class="nav-link d-flex">
                <img src="{{ asset($papularArticle->image) }}" class="img-fluid d-inline-block p-1 famous-news-img" alt="">
                <a href="{{ route('singleArticle', $papularArticle->url) }}" class="text-dark p-2 famous-news-link">
                    <span class="d-block short-news-title"> {{ $papularArticle->title }} </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>

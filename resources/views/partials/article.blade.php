<article class="blog-article">
    <h3 class="blog-title"><a href="{{ url('/articles', $article->slug) }}">{{ $article->title }}</a></h3>

    <p class="blog-body">{{ str_limit($article->body, $limit = 200, $end = '...')  }}<a href="{{ url('/articles', $article->slug) }}">Read More</a></p>

    <footer class="post-meta">
        <img class="author-thumb" src="//www.gravatar.com/avatar/8d8b7a064d274ce70c0c9e0d4227af4d?s=250&amp;d=mm&amp;r=x" alt="Author image" nopin="nopin">
        <a href="/author/abhishek/">{{ $article->user->name }}</a>

        <time class="post-date" datetime="2015-04-30">{{ $article->published_at->diffForHumans() }}</time>
        <p class="post-tags">Tags :
            @foreach($article->tags as $tag)
               <a href="{{ url('tags', $tag->name) }}">{{ $tag->name }}</a>
            @endforeach
        </p>
    </footer>

</article>
<div class="post-preview-wrapper">
  <a href={{$post->path()}}>
    <div class="post-preview">
      <h4 class="title"> {{$post->title}} </h4>
      <div class="post-data">
        <div class="likes-comments-counter">
          <span class="likes"> 
            {{$post->likes_count}} 
            <span class="material-icons">
              thumb_up
              </span>
              {{$post->likes_count}} 
           </span>
          <span class="dislikes"> 
            <span class="material-icons">
              thumb_down
              </span>
              {{$post->dislikes_count}}  
             </span>
          <span class="comments">
             <span style="margin-left: 0.4rem">comments  </span>
             <span class="material-icons">
              comment
              </span>
              {{ $post->comments_count}}
          </span>
        </div>
        <span class="date"> {{$post->created_at}}  </span>
      </div>
  </a>
    @if( count($post->tags) > 0 )
      <div class="tags">
        @foreach ($post->tags as $tag)
          <a href={{route(  isset($user_posts) ? "user-posts" : "posts" ,["tag"=>$tag->name])}}>
            <span class="tag" style="background-color: {{$tag->color}}">{{ $tag->name  }}</span>
          </a>
        @endforeach
      </div>
    @endif
</div>

<div class="col-md-3 col-sm-3 blog-sidebar">
    <!-- CATEGORIES START -->
    <h2 class="no-top-space">Categorias</h2>
    <ul class="nav sidebar-categories margin-bottom-40">
        @foreach ($categorias as $categoria)
            <li><a href="{{route("blog.categoria", $categoria->slug)}}">{{$categoria->nombre}} ({{$categoria->post->count()}})</a></li>
        @endforeach
    </ul>
    </div>
    <!-- CATEGORIES END -->
    <!-- BEGIN BLOG TAGS -->
    <div class="blog-tags margin-bottom-20">
    <h2>Tags</h2>
    <ul>
        @foreach ($tags as $tag)
            <li><a href="{{route("blog.tag", $tag->slug)}}"><i class="fa fa-tags"></i>{{$tag->nombre}}</a></li>
        @endforeach
    </ul>
    </div>
    <!-- END BLOG TAGS -->
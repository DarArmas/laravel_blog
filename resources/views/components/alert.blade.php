<div class="alert alert-{{$tipo}} alert-dismissible" role="alert">
    <h4 class="alert-heading">Laravel Blog</h4>
    <p>
        @if(is_object($mensaje))
            <ul>
                @foreach($mensaje->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @else
            {{$mensaje}}
        @endif
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@isset($breadcrumbs)

     <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot">
            @foreach($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item {{$loop->last?'active':""}}"><a href="{{$breadcrumb['url']??""}}">{{$breadcrumb['title']??""}}</a>
                </li>
            @endforeach
        </ol>
    </nav>
 @endisset



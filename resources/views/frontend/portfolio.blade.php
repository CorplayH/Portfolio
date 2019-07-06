<div class="section-title-block">
    <h2 class="section-title">Portfolio</h2>
</div>
<!-- Portfolio Content -->
<div class="portfolio-content">
    <!-- Portfolio filter -->
    <ul id="portfolio_filters" class="portfolio-filters">
        <li class="active">
            <a class="filter btn btn-sm btn-link active" data-group="all">All</a>
        </li>
        @foreach($portfolioInfo->allTags as $allTag )
            <li>
                <a class="filter btn btn-sm btn-link" data-group={{$allTag['name']}}>{{$allTag['name']}}</a>
            </li>
        @endforeach
    </ul>
    <!-- End of Portfolio filter -->
    <!-- Portfolio Grid -->
    <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">
        @foreach($portfolioInfo->details as $k => $detail )
            <figure class="item" data-groups='["All","{{$detail['tag']}}"]'>
                @if($detail['type'] == 'Image')
                    <a class="lightbox" target="_self" href="{{$detail['fileUrl']}}" title="{{$detail['name']}}">
                        <img src="{{$detail['thumbUrl']}}" alt="">
                        <div>
                            <h5 class="name">{{$detail['name']}}</h5>
                            <small>{{$detail['type']}}</small>
                            <i class="fa fa-image"></i>
                        </div>
                    </a>
                @elseif($detail['type'] == 'PDF')
                    <a class="" target="_blank" href="{{$detail['fileUrl']}}">
                        <img src="{{$detail['thumbUrl']}}" alt="">
                        <div>
                            <h5 class="name">{{$detail['name']}}</h5>
                            <small>{{$detail['type']}}</small>
                            <i class="fa fa-file-text-o"></i>
                        </div>
                    </a>
                @else
                    <a class="" target="_blank" href="{{$detail['fileUrl']}}">
                        <img src="{{$detail['thumbUrl']}}" alt="">
                        <div>
                            <h5 class="name">{{$detail['name']}}</h5>
                            <small>{{$detail['type']}}</small>
                            <i class="fa fa-link"></i>
                        </div>
                    </a>
                @endif
            </figure>
        @endforeach
    </div>

<!-- /Portfolio Grid -->

</div>
<!--end add New modal-->
<!-- /Portfolio Content -->
@push('js')

@endpush

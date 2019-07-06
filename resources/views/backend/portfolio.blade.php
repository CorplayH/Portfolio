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
    <div class="row">
        <button
            class="btn btn-success col-xs-6 col-6 m-auto"
            data-target="#addNew"
            data-toggle="modal">
            Add new portfolio
        </button>
    </div>
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
                <a href="javascript:;" onclick="delPortfolio(this)" class="btn mt-1 btn-sm btn-danger">Delete</a>
                <form action="{{route('info.delPortfolio',$k)}}" hidden method="post">
                    @csrf @method('DELETE')
                </form>
            </figure>
        @endforeach
    </div>
    <!-- /Portfolio Grid -->

    <!--add New modal-->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header block-title mb-3">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="col-12 subpage-block">
                    <form id="addNewForm" method="post" action="{{route('info.addNewPortfolio',$uToken)}}"
                          novalidate="true">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group p-0">
                                    <h5>Project name:</h5>
                                    <input type="text" name="name"
                                           class="form-control"
                                           value="{{old('name')}}"
                                           required="required" data-error="value"
                                           placeholder="Project name">
                                    <div class="form-control-border"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group p-0">
                                    <div class="form-group p-0 has-error has-danger">
                                        <h5>Choose a project Category:</h5>
                                        @foreach($portfolioInfo->allTags as $tag )
                                            <div class="form-check form-check-inline categoryRadio">
                                                <label class="form-check-label">
                                                    <input type="radio" name="category" value="{{$tag['name']}}"
                                                           class="form-check-input ">
                                                    {{$tag['name']}}
                                                </label>
                                            </div>
                                        @endforeach
                                        <h5>Or create a new project Category:</h5>
                                        <input type="text" name="newCategory" class="form-control categoryInput"
                                               value=""
                                               required="required" data-error="value"
                                               placeholder="Project Category">

                                        <div class="form-control-border"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <h5>What is your project type?</h5>
                                <div class="form-group p-0">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" id="imageRadio" type="radio" name="type"
                                                   value="Image">
                                            Image
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" id="pdfRadio" type="radio" name="type"
                                                   value="PDF">
                                            PDF
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" id="websiteRadio" type="radio" name="type"
                                                   value="Website">
                                            Website
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row imageType" style="display: none;">
                            <div class="col-12">
                                <button type="button" class="uploadBtn imageType btn btn-success col-xs-12 col-12 mb-1"
                                >
                                    Upload image
                                </button>
                            </div>
                            <div class="col-12 imageTypePreview">

                            </div>
                        </div>

                        <div class="row pdfType" style="display: none;">
                            <div class="col-12">
                                <div class="form-group p-0 has-error has-danger">
                                    <button type="button" id="pdfType"
                                            class="uploadBtn btn btn-success col-xs-12 col-12 mb-1"
                                    >
                                        Upload your pdf file
                                    </button>
                                    <div id="pdfTypePreview" class="col-12"></div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <input class="form-check-input" type="checkbox" name="defPDFThumb"
                                                   value="true" id="defaultCheck1">
                                            Use Default thumbnail
                                        </label>
                                    </div>
                                    <button type="button" id="defPDFThumbBtn"
                                            class="uploadBtn imageType btn btn-primary col-xs-12 col-12 mb-1"
                                    >
                                        Upload a thumbnail
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 imageTypePreview"></div>
                        </div>
                        <div class="row websiteType" style="display: none;">
                            <div class="col-12">
                                <div class="form-group p-0 has-error has-danger">
                                    <h5>Website url:
                                        <span>please include <span class="text-danger">https://</span>
                                            or <span class="text-danger"> http:// </span>
                                        </span>
                                    </h5>
                                    <input type="text" name="websiteUrl" value=""
                                           class="form-control "
                                           required="required" data-error="value"
                                           placeholder="Website Url">
                                    <div class="form-control-border"></div>
                                    <div class="help-block with-errors"></div>

                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="defaultCheck2">
                                        <input class="form-check-input" type="checkbox" name="defWebThumb" value="true"
                                               id="defaultCheck2">
                                        Use Default thumbnail
                                    </label>
                                </div>
                                <button type="button" id="defWebThumbBtn"
                                        class="uploadBtn imageType btn btn-primary col-xs-12 col-12 mb-1"
                                >
                                    Upload a thumbnail
                                </button>
                            </div>
                            <div class="col-12 imageTypePreview"></div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button btn-send btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" onclick="submit(this)" class="button btn-send" data-dismiss="modal">Save
                    </button>
                    <!--data-dismiss="modal"-->
                </div>
            </div>
        </div>
    </div>

</div>
<!--end add New modal-->
<!-- /Portfolio Content -->
@push('js')

@endpush

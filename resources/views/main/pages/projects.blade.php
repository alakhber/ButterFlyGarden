@extends('layouts.main')
@section('_title')
| Lahiyələr
@endsection
@section('_content')
    <!-- page title -->
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="inner-title">
                    <div class="overlay-image"></div>
                    <div class="banner-title">
                        <div class="page-title-heading">
                            Lahiyələr
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span> |
                            <span><a class="home" href="{{ route('projects') }}">Lahiyələr</a></span>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>
    <!-- /.page-title -->

    <!-- our-profolio -->
    <section class="flat-case-study">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60"></div>
                </div>

                @foreach ($projects as $project)
                    <div class="col-md-6">
                        <div class="list-box-profolio wow fadeInUp">
                            <div class="image-profolio">
                                <img src="{{ _img($project->avatar) }}" alt="{{ $project->name }}">
                                <div class="profolio-show">
                                    <div class="profolio-info">
                                        <div class="info">
                                            <a href="case-details.html">
                                                <h3 class="section-heading-jost-size20">
                                                    {{ $project->name }}</h3>
                                            </a>
                                            <p class="desc-box">{{  Str::limit(strip_tags(html_entity_decode($project->content)), 40)  }}</p>
                                        </div>
                                        <div class="button-next">
                                            <a class="profolio-btn" href="{{ route('project',$project->slug) }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="30" data-smobile="30"></div>
                    </div>
                @endforeach
                <div class="row ">
                    <div class="col-lg-12  ">
                        <div class="themesflat-pagination clearfix">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="145" data-mobile="60" data-smobile="60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- /our profolio -->
@endsection



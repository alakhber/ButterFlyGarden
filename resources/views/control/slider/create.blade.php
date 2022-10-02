@extends('layouts.admin')
@section('title', 'Admin Dashboard | Yeni Slider')
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            language: 'az'
        });
    </script>
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Yeni Slider</span></h4>
            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('system.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    <a href="{{ route('system.blog.index') }}" class="breadcrumb-item"> Sliderlər</a>
                    <span class="breadcrumb-item active">Yeni Slider</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Slider Haqqında</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <input type="text" name="link" id="link" value="{{ old('link') }}" class="form-control form-control-outline @error('link') is-invalid @enderror" placeholder="Url">
                                    <label class="label-floating">Url</label>
                                </div>
                                @error('link')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" name="button" id="button" value="{{ old('button') }}" class="form-control form-control-outline @error('button') is-invalid @enderror" placeholder="Button Adı">
                                    <label class="label-floating">Button Adı</label>
                                </div>
                                @error('button')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <textarea class="form-control form-control-outline ckeditor  @error('content') is-invalid @enderror" name="content" id="content" placeholder="Content">{{ old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('photo')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input @error('photo')  is-invalid @enderror" name="photo" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="fas fa-save ml-2"></i></button>
                    </div>
                </div>
            </div>
         
 
        </form>
    </div>
@endsection

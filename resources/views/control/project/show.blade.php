@extends('layouts.admin')
@section('title', 'Admin Dashboard | '.$project->name)
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
    @include('control.project._imgCheck')
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Redaktə</span></h4>
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
                    <a href="{{ route('system.project.index') }}" class="breadcrumb-item"> Lahiyələr</a>
                    <span class="breadcrumb-item active">Redaktə</span>
                    <span class="breadcrumb-item active">{{ $project->name }}</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.project.update',$project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Lahiyə Haqqında</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ $project->name }}" class="form-control form-control-outline @error('name') is-invalid @enderror" placeholder="Lahiyə Adı">
                                    <label class="label-floating">Lahiyə Adı</label>
                                </div>
                                @error('name')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <input type="text" name="slug" id="slug" value="{{ $project->slug }}" class="form-control form-control-outline @error('slug') is-invalid @enderror" placeholder="Url">
                                    <label class="label-floating">Url</label>
                                </div>
                                @error('slug')
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
                                    @error('avatar')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview @error('avatar')  is-invalid @enderror" name="avatar" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
           
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-heading"></i>
                                    </div>
                                    <input type="text" name="title" id="title" value="{{ optional($project->seo)->title }}" class="form-control form-control-outline @error('title') is-invalid @enderror" placeholder="Meta Title">
                                    <label class="label-floating">Meta Title</label>
                                </div>
                                @error('title')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-keyboard"></i>
                                    </div>
                                    <input type="text" name="keywords" id="keywords" value="{{ optional($project->seo)->keywords }}" class="form-control form-control-outline @error('keywords') is-invalid @enderror" placeholder="Meta Açar Sözlər">
                                    <label class="label-floating">Meta Açar Sözlər</label>
                                </div>
                                @error('keywords')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <textarea class="form-control form-control-outline @error('description') is-invalid @enderror" name="description" id="description" placeholder="Meta Description">{{ optional($project->seo)->description }}</textarea>
                                    <label class="label-floating">Meta Description</label>
                                </div>
                                @error('description')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('metaimage')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview-meta @error('metaimage')  is-invalid @enderror" name="metaimage" data-show-caption="false" data-show-upload="false" data-fouc>
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

@extends('layouts.admin')
@section('title', 'Admin Dashboard | Yeni Kataloq')
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>

    <script src="{{ _adminJs('app.js') }}"></script>
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Yeni Kataloq</span></h4>
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
                    <a href="{{ route('system.category.index') }}" class="breadcrumb-item"> Kataloqlar</a>
                    <span class="breadcrumb-item active">Yeni Kataloq</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.category.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Kataloq M??lumatlar??</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control form-control-outline @error('name') is-invalid @enderror" placeholder="Kataloq Ad??">
                                    <label class="label-floating">Kataloq Ad??</label>
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
                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control form-control-outline @error('slug') is-invalid @enderror" placeholder="Url">
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
                                    <select class="custom-select form-control-outline @error('category_id') is-invalid @enderror" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == 1 ? 'selected' : null }}>{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    <label class="label-floating">Kataloq Se??</label>
                                </div>
                                @error('category_id')
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
                                    <input type="file" class="file-input @error('avatar')  is-invalid @enderror" name="avatar" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo M??lumatlar??</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-heading"></i>
                                    </div>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control form-control-outline @error('title') is-invalid @enderror" placeholder="Meta Title">
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
                                    <input type="text" name="keywords" id="keywords" value="{{ old('keywords') }}" class="form-control form-control-outline @error('keywords') is-invalid @enderror" placeholder="Meta A??ar S??zl??r">
                                    <label class="label-floating">Meta A??ar S??zl??r</label>
                                </div>
                                @error('keywords')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <textarea class="form-control form-control-outline @error('description') is-invalid @enderror" name="description" id="description" placeholder="Meta Description">{{ old('description') }}</textarea>
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
                                    <input type="file" class="file-input @error('metaimage')  is-invalid @enderror" name="metaimage" data-show-caption="false" data-show-upload="false" data-fouc>
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

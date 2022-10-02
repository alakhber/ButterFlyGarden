@extends('layouts.admin')
@section('title', 'Admin Dashboard | Tənzimləmələr')
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>

    <script src="{{ _adminJs('app.js') }}"></script>
    @include('control.setting._imageCheck')
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Tənzimləmələr   {{ $setting->main_footer }}</span></h4>
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
                    <span class="breadcrumb-item active">Tənzimləmələr</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.setting.update') }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method('patch')
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Tənzimləmələr</legend>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-heading"></i>
                                    </div>
                                    <input type="text" name="main_title" id="main_title" value="{{ optional($setting)->main_title }}" class="form-control form-control-outline @error('email') is-invalid @enderror" placeholder="E-Poçt">
                                    <label class="label-floating">E-Poçt</label>
                                </div>
                                @error('main_title')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 ">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <select class="custom-select form-control-outline @error('site') is-invalid @enderror" name="site">
                                            <option value="1" {{ $setting->site == 1 ? 'selected' : null }}>Aktiv</option>
                                            <option value="0" {{ $setting->site == 0 ? 'selected' : null }}>DeAktiv</option>
                                    </select>
                                    <label class="label-floating">Saytın Vəziyəti</label>
                                </div>
                                @error('site')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('main_logo')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview-main @error('main_logo')  is-invalid @enderror" name="main_logo" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('footer_logo')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview-footer @error('footer_logo')  is-invalid @enderror" name="footer_logo" data-show-caption="false" data-show-upload="false" data-fouc>
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
                                    <input type="text" name="title" id="title" value="{{ optional($setting->seo)->title }}" class="form-control form-control-outline @error('title') is-invalid @enderror" placeholder="Meta Title">
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
                                    <input type="text" name="keywords" id="keywords" value="{{ optional($setting->seo)->keywords }}" class="form-control form-control-outline @error('keywords') is-invalid @enderror" placeholder="Meta Açar Sözlər">
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
                                    <textarea class="form-control form-control-outline @error('description') is-invalid @enderror" name="description" id="description" placeholder="Meta Description">{{ optional($setting->seo)->description }}</textarea>
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

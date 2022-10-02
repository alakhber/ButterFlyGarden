@extends('layouts.admin')
@section('title', 'Admin Dashboard | Üzv |' .$personal->fullname)
@section('_scripts')
    <!-- Theme JS files -->
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>

    <script src="{{ _adminJs('app.js') }}"></script>
    @include('control.personal._imageCheck')
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
                    <a href="{{ route('system.personal.index') }}" class="breadcrumb-item"> Üzvlər</a>
                    <span class="breadcrumb-item active">Redaktə</span>
                    <span class="breadcrumb-item active">{{ $personal->fullname }}</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('system.personal.update',$personal) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Üzv Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="fullname" id="fullname" value="{{ $personal->fullname }}" class="form-control form-control-outline @error('fullname') is-invalid @enderror" placeholder="Ad Soyad">
                                    <label class="label-floating">Ad Soyad</label>
                                </div>
                                @error('fullname')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="position" id="position" value="{{ $personal->position }}" class="form-control form-control-outline @error('position') is-invalid @enderror" placeholder="Vəzifə">
                                    <label class="label-floating">Vəzifə</label>
                                </div>
                                @error('position')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-4 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="facebook" id="facebook" value="{{ $personal->facebook }}" class="form-control form-control-outline @error('facebook') is-invalid @enderror" placeholder="Facebook">
                                    <label class="label-floating">Vəzifə</label>
                                </div>
                                @error('facebook')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-4 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="linkedin" id="linkedin" value="{{ $personal->linkedin }}" class="form-control form-control-outline @error('linkedin') is-invalid @enderror" placeholder="Linkedin">
                                    <label class="label-floating">Linkedin</label>
                                </div>
                                @error('linkedin')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-4 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="twitter" id="twitter" value="{{ $personal->twitter }}" class="form-control form-control-outline @error('twitter') is-invalid @enderror" placeholder="Twitter">
                                    <label class="label-floating">Linkedin</label>
                                </div>
                                @error('twitter')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    @error('image')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" class="file-input file-input-preview @error('image')  is-invalid @enderror" name="image" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="fas fa-save ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

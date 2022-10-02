@extends('layouts.admin')
@section('title', 'Admin Dashboard | '.$partner->name)
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
                    <a href="{{ route('system.partner.index') }}" class="breadcrumb-item"> Partnerlər</a>
                    <span class="breadcrumb-item active">Redaktə</span>
                    <span class="breadcrumb-item active">{{ $partner->name }}</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <form action="{{ route('system.partner.update',$partner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Partner Haqqında</legend>
                        <div class="form-group form-group-floating col-lg-12 ">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ optional($partner)->name }}" class="form-control form-control-outline @error('name') is-invalid @enderror" placeholder="Partner Adı">
                                    <label class="label-floating">Partner Adı</label>
                                </div>
                                @error('name')
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Yadda Saxla <i class="fas fa-save ml-2"></i></button>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
@endsection

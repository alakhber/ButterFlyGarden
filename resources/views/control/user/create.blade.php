@extends('layouts.admin')
@section('title', 'Admin Dashboard | Yeni İstifadəçi')
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
                <h4><span class="font-weight-semibold">Yeni İstifadəçi</span></h4>
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
                    <a href="{{ route('system.user.index') }}" class="breadcrumb-item"> İstifadəçilər</a>
                    <span class="breadcrumb-item active">Yeni İstifadəçi</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('system.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">İstifadəçi Məlumatları</legend>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" class="form-control form-control-outline @error('fullname') is-invalid @enderror" placeholder="Ad Soyad">
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
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control form-control-outline @error('username') is-invalid @enderror" placeholder="İstifadəçi Adı">
                                    <label class="label-floating">İstifadəçi Adı</label>
                                </div>
                                @error('username')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-at"></i>
                                    </div>
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-outline @error('email') is-invalid @enderror" placeholder="E-Poçt">
                                    <label class="label-floating">E-Poçt</label>
                                </div>
                                @error('email')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control form-control-outline @error('phone') is-invalid @enderror" placeholder="Əlaqə Nömrəsi">
                                    <label class="label-floating">Əlaqə Nömrəsi</label>
                                </div>
                                @error('phone')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-outline @error('password') is-invalid @enderror" placeholder="Şifrə">
                                    <label class="label-floating">Şifrə</label>
                                </div>
                                @error('password')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-6 row">
                            <div class="col-lg-12">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="form-control-feedback">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-outline @error('password_confirmation') is-invalid @enderror" placeholder="Şifrə">
                                    <label class="label-floating">Şifrə</label>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-floating col-lg-12 row">
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <select class="custom-select form-control-outline @error('type') is-invalid @enderror" name="type">
                                        <option value="Super-Admin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Moderator">Moderator</option>
                                        <option value="Sales-Manager">Satış Meneceri</option>
                                    </select>
                                    <label class="label-floating">Vəzifə Seç</label>
                                </div>
                                @error('type')
                                    <span class="text-danger pl-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    @error('avatart')
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
                </form>
            </div>
        </div>
    </div>
@endsection

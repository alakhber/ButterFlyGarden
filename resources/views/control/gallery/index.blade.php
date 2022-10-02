@extends('layouts.admin')
@section('title', 'Admin Dashboard | Qalerya ')
@section('_styles')
    <link rel="stylesheet" href="https://v2.travels.az/adminlte/plugins/magify/magnific-popup.css">
    <link rel="stylesheet" href="https://v2.travels.az/adminlte/plugins/magify/user-card.css">
@endsection
@section('_scripts')
    <script src="{{ _adminJs('plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/uploader_bootstrap.js') }}"></script>
    <script src="{{ _adminJs('plugins/notifications/pnotify.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('jquery-ui.js') }}"></script>
    <script src="{{ _adminJs('clipboard.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/notifications/pnotify.min.js') }}"></script>

    <script>
        var clipboard = new ClipboardJS('.copy');
        clipboard.on('success', function(e) {
            new PNotify({
                title: 'Uğurlu Əməliyyat',
                text: 'Şəkil Uğurla Kopyalandı.İstənilən CTRL-V ilə Əlavə Edə Bilərsiniz',
                icon: 'icon-checkmark3',
                type: 'success'
            });
        });

        clipboard.on('error', function(e) {
            new PNotify({
                title: 'Uğursuz Əməliyyat',
                text: 'Şəkil Kopyalanan Zaman Xəta Baş Verdi.Biraz Sonra Yenidən Yoxlayın',
                icon: 'icon-checkmark3',
                type: 'error'
            });
        });
    </script>

@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Qalerya</span></h4>
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
                    <a href="{{ route('system.image.index') }}" class="breadcrumb-item"> Qalerya</a>

                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('system.image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Şəkil Seç</legend>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('image')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" multiple class="file-input @error('image')  is-invalid @enderror" name="image[]" data-show-caption="false" data-show-upload="false" data-fouc>
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
        <div class="card">
            <div class="card-body">
                <fieldset class="mb-3 row">
                    <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Qalerya Sekilleri</legend>
                    <div class="row el-element-overlay" id='sortable'>
                        @forelse ($images as $image)
                            <div class="col-lg-4 col-md-6 list" data-id={{ $image->id }} data-position="1">
                                <div class="card">
                                    <div class="el-card-item pb-0">
                                        <div class="el-card-avatar el-overlay-1 mb-0">
                                            <img src="{{ _img($image->image) }}" style="width: 100%; height:300px; object-fit:contain" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit copy" title="Kopyala" data-clipboard-action="copy" data-clipboard-target="#image-{{ $image->id }}" href="javascript:void(0)"><i class="fas fa-link"></i></a></li>
                                                    <input type="hidden" value="{{ _asset(_img($image->image)) }}" id="image-{{ $image->id }}">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" title="Bax" href="{{ _img($image->image) }}"><i class="fas fa-search"></i></a></li>
                                                    <li>
                                                        <a title="Sil" href="javascript:void(0)" class="btn default btn-outline DELETEITEM "><i class="text-danger fas fa-trash"></i>
                                                            <form action="{{ route('system.image.delete', $image) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>

                </fieldset>
            </div>
        </div>

    </div>
@endsection

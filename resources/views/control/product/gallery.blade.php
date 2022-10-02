@extends('layouts.admin')
@section('title', 'Admin Dashboard | ' . $product->name . '| Qalerya ')
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
    <!-- Theme JS files -->
    <script src="{{ _adminJs('jquery-ui.js') }}"></script>
    
    <script>
        $(function() {
            $("#sortable").sortable();
            $('#sortable').on("sortupdate", function(event, ui) {

                $(this).children().each(function(index) {
                    if ($(this).attr('data-position') != (index + 1)) {
                        $(this).attr('data-position', (index + 1)).addClass('updated');
                    }
                })
                saveNewPosition();
            });
            $("#sortable").disableSelection();

            function saveNewPosition() {
                let positions = [];
                $('#sortable > div').each(function() {
                    positions.push([$(this).attr('data-id'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                })
                console.log(positions);
                $.ajax({
                    url: `{{ route('system.product.gallery.sortable', $product) }}`,
                    method: 'POST',
                    data: {
                        _token: `{{ csrf_token() }}`,
                        _method: 'PUT',
                        positions: positions
                    },
                    
                    success: function(response) {
                        new PNotify({
                            title: 'Uğurlu Əməliyyat',
                            text: `${response.msg}`,
                            icon: 'icon-checkmark3',
                            type: 'success'
                        });
                        setTimeout(() => {
                            Swal.hideLoading();
                        }, 1000);
                    }
                });

            }

        });
    </script>
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">{{ $product->name }} Üçün Şəkillər</span></h4>
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
                    <a href="{{ route('system.product.index') }}" class="breadcrumb-item"> Məhsullar</a>
                    <span class="breadcrumb-item active">{{ $product->name }}</span>
                    <span class="breadcrumb-item active">Şəkilləri</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('system.product.gallery.upload', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3 row">
                        <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Şəkil Seç</legend>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    @error('gallery')
                                        <span class="text-danger pl-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" multiple class="file-input @error('gallery')  is-invalid @enderror" name="gallery[]" data-show-caption="false" data-show-upload="false" data-fouc>
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
                        @forelse ($product->gallery as $image)
                            <div class="col-lg-4 col-md-6 list" data-id="{{ $image->id }}" data-position="{{ $image->position }}">
                                <div class="card">
                                    <div class="el-card-item pb-0">
                                        <div class="el-card-avatar el-overlay-1 mb-0">
                                            <img src="{{ _img($image->image) }}" style="width: 100%; height:300px; object-fit:contain" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ _img($image->image) }}"><i class="fas fa-search"></i></a></li>
                                                    <li>
                                                        <a title="Sil" href="javascript:void(0)" class="btn default btn-outline DELETEITEM "><i class="text-danger fas fa-trash"></i>
                                                            <form action="{{ route('system.product.gallery.delete', ['product' => $product, 'image' => $image]) }}" method="post">
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

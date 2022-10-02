@extends('layouts.admin')
@section('title', 'Admin Dashboar | Sliderlər')
@section('_scripts')
    <script src="{{ _adminJs('plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/datatables_responsive.js') }}"></script>
    <script src="{{ _adminJs('plugins/notifications/pnotify.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                $('#sortable > tr').each(function() {
                    positions.push([$(this).attr('data-id'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                })
                console.log(positions);
                $.ajax({
                    url: `{{ route('system.slider.sortable') }}`,
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
                <h4><span class="font-weight-semibold">Sliderlər</span></h4>
            </div>
            <div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
                <a href="{{ route('system.slider.create') }}" class="btn btn-primary w-100 w-sm-auto"> <i class="fas fa-plus-circle mr-2"></i> Yeni Slider</a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    {{-- <a href="#" class="breadcrumb-item">İstifadəçilər</a> --}}
                    <span class="breadcrumb-item active">Sliderlər</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table datatable-responsive">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Link</th>
                            <th>Link Adı</th>
                            <th></th>
                            <th></th>
                            <th>Şəkil</th>
                            <th>Status</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @foreach ($sliders as $slider)
                            <tr data-id="{{ $slider->id }}" data-position="{{ $slider->position }}">
                                <td>#{{ $slider->position }}</td>
                                <td>{{ $slider->link ?? 'Təyin Edilməyib' }}</td>
                                <td>{{ $slider->button ?? 'Təyin Edilməyib' }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ _checkFile($slider->avatar) ? _asset(_img($slider->avatar)) : 'javascript:void(0)' }}">
                                        <i class="fas {{ _checkFile($slider->avatar) ? 'fa-eye' : 'fa-eye-slash' }} " title="{{ _checkFile($slider->avatar) ? 'Şəkilə Bax' : 'Şəkil Təyin Edilməyib' }} "></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch custom-control-success mb-2">
                                        <input type="checkbox" class="custom-control-input CHANGESTATUS" id="sc_r_success-{{ $slider->id }}" {{ $slider->status ? 'checked' : null }}>
                                        <form action="{{ route('system.slider.status', $slider) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <label class="custom-control-label" for="sc_r_success-{{ $slider->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a title="Redaktə Et" href="{{ route('system.slider.show', $slider) }}" class="dropdown-item"><i class="text-primary fas fa-pen"></i> Redaktə Et</a>
                                                <a title="Sil" href="javascript:void(0)" class="dropdown-item DELETEITEM"><i class="text-danger fas fa-trash"></i> Sil
                                                    <form action="{{ route('system.slider.delete', $slider) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

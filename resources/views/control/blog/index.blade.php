@extends('layouts.admin')
@section('title', 'Admin Dashboar | Bloglar')
@section('_scripts')
    <script src="{{ _adminJs('plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/datatables_responsive.js') }}"></script>

@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Bloglar</span></h4>
            </div>
            <div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
                <a href="{{ route('system.blog.create') }}" class="btn btn-primary w-100 w-sm-auto"> <i class="fas fa-plus-circle mr-2"></i> Yeni Blog</a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    {{-- <a href="#" class="breadcrumb-item">İstifadəçilər</a> --}}
                    <span class="breadcrumb-item active">Bloglar</span>
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
                            <th>Blog Adı</th>
                            <th>Slug</th>
                            <th>Şəkil</th>
                            <th></th>
                            <th>Status</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->name }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>
                                    <a href="{{ _checkFile($blog->avatar) ? _asset(_img($blog->avatar)) : 'javascript:void(0)' }}">
                                        <i class="fas {{ _checkFile($blog->avatar) ? 'fa-eye' : 'fa-eye-slash' }} " title="{{ _checkFile($blog->avatar) ? 'Şəkilə Bax' : 'Şəkil Təyin Edilməyib' }} "></i>
                                    </a>
                                </td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-switch custom-control-success mb-2">
                                        <input type="checkbox" class="custom-control-input CHANGESTATUS" id="sc_r_success-{{ $blog->id }}" {{ $blog->status ? 'checked' : null }}>
                                        <form action="{{ route('system.blog.status', $blog) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <label class="custom-control-label" for="sc_r_success-{{ $blog->id }}"></label>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a title="Qalerya" href="{{ route('system.blog.gallery.index', $blog) }}" class="dropdown-item"><i class="text-primary icon-images2"></i> Şəkillərə Bax</a>
                                                <a title="Redaktə Et" href="{{ route('system.blog.show', $blog) }}" class="dropdown-item"><i class="text-primary fas fa-pen"></i> Redaktə Et</a>
                                                <a title="Sil" href="javascript:void(0)" class="dropdown-item DELETEITEM"><i class="text-danger fas fa-trash"></i> Sil
                                                    <form action="{{ route('system.blog.delete', $blog) }}" method="post">
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

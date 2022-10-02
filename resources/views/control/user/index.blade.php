@extends('layouts.admin')
@section('title', 'Admin Dashboar | İstifadəçilər')
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">İstifadəçilər</span></h4>
            </div>
            <div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
                <a href="{{ route('system.user.create') }}" class="btn btn-primary w-100 w-sm-auto"> <i class="fas fa-plus-circle mr-2"></i> Yeni İstifadəçi</a>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    {{-- <a href="#" class="breadcrumb-item">İstifadəçilər</a> --}}
                    <span class="breadcrumb-item active">İstifadəçilər</span>
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
                            <th>Ad Soyad</th>
                            <th>İstifadəçi Adı</th>
                            <th>E-Poçt</th>
                            <th>Tel</th>
                            <th>Status</th>
                            <th>Vəzifə</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                {{-- <td>{{ $user->type }}</td> --}}

                                <td>
                                    <div class="custom-control custom-switch custom-control-success mb-2">
                                        <input type="checkbox" class="custom-control-input CHANGESTATUS" id="sc_r_success-{{ $user->id }}" {{ $user->status ? 'checked' : null }}>
                                        <form action="{{ route('system.user.status',$user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <label class="custom-control-label" for="sc_r_success-{{ $user->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                @if ($user->type == 'Super-Admin')
                                                    <i title="Super Admin" class="fas fa-user-cog"></i>
                                                @elseif ($user->type == 'Admin')
                                                    <i title="Admin" class="fas fa-user-shield"></i>
                                                @elseif ($user->type == 'Moderator')
                                                    <i title="Moderator" class="fas fa-user-edit"></i>
                                                @elseif ($user->type == 'Sales-Manager')
                                                    <i title="Satiş Meneceri" class="fas fa-headset"></i>
                                                @endif
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item CHANGETYPE"><i class="{{ $user->type == 'Super-Admin' ? 'text-success' : 'text-secondary' }}  fas fa-user-cog"></i> Super Admin
                                                <form action="{{ route('system.user.type',$user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="Super-Admin" name="type">
                                                </form>
                                                </a>
                                                <a href="#" class="dropdown-item CHANGETYPE"><i class="{{ $user->type == 'Admin' ? 'text-success' : 'text-secondary' }}  fas fa-user-shield"></i> Admin 
                                                <form action="{{ route('system.user.type',$user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="Admin" name="type">
                                                </form>
                                                </a>
                                                <a href="#" class="dropdown-item CHANGETYPE"><i class="{{ $user->type == 'Moderator' ? 'text-success' : 'text-secondary' }}  fas fa-user-edit"></i> Moderator
                                                <form action="{{ route('system.user.type',$user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="Moderator" name="type">
                                                </form>
                                                </a>
                                                <a href="#" class="dropdown-item CHANGETYPE"><i class="{{ $user->type == 'Sales-Manager' ? 'text-success' : 'text-secondary' }}  fas fa-headset"></i> Satis Meneceri
                                                <form action="{{ route('system.user.type',$user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="Sales-Manager" name="type">
                                                </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a title="Redaktə Et" href="{{ route('system.user.show', $user) }}" class="dropdown-item"><i class="text-primary fas fa-pen"></i> Redaktə Et</a>
                                                <a title="Sil" href="javascript:void(0)" class="dropdown-item DELETEITEM"><i class="text-danger fas fa-trash"></i> Sil
                                                    <form action="{{ route('system.user.delete', $user) }}" method="post">
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
@section('_scripts')
    <script src="{{ _adminJs('plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/datatables_responsive.js') }}"></script>
@endsection

@extends('layouts.admin')
@section('title', 'Admin Dashboar | İzləyicilər')

@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">İzləyicilər</span></h4>
            </div>
            <div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#subsSTORE" class="btn btn-primary w-100 w-sm-auto"> <i class="fas fa-plus-circle mr-2"></i> Yeni İzləyici</a>
                <div id="subsSTORE" class="modal fade" tabindex="-1">
                    <form action="{{ route('system.subscriptions.store') }}" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Yeni İzləyici</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group form-group-floating col-lg-12 row">
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
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">İmtina Et</button>
                                    <button class="btn btn-primary">Əlavə Et</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    {{-- <a href="#" class="breadcrumb-item">İstifadəçilər</a> --}}
                    <span class="breadcrumb-item active">İzləyicilər</span>
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
                            <th></th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            <th>Status</th>
                            <th class="text-center">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td></td>
                                <td>{{ $subscription->email }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-switch custom-control-success mb-2">
                                        <input type="checkbox" class="custom-control-input CHANGESTATUS" id="sc_r_success-{{ $subscription->id }}" {{ $subscription->status ? 'checked' : null }}>
                                        <form action="{{ route('system.subscriptions.status', $subscription) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <label class="custom-control-label" for="sc_r_success-{{ $subscription->id }}"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a title="Sil" href="javascript:void(0)" class="dropdown-item DELETEITEM"><i class="text-danger fas fa-trash"></i> Sil
                                                    <form action="{{ route('system.subscriptions.delete', $subscription) }}" method="post">
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
    @if ($errors->any())
        <script>
            $(function() {
                $('#subsSTORE').modal('toggle')
            });
        </script>
    @endif
@endsection

@extends('layouts.admin')
@section('title', 'Admin Dashboar | Kataloqlar')

@section('_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" integrity="sha512-A81ejcgve91dAWmCGseS60zjrAdohm7PTcAjjiDWtw3Tcj91PNMa1gJ/ImrhG+DbT5V+JQ5r26KT5+kgdVTb5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('_content')
    <div class="page-header page-header-light">
        <div class="page-header-content d-sm-flex">
            <div class="page-title">
                <h4><span class="font-weight-semibold">Kataloqlar</span></h4>
            </div>
            <div class="my-sm-auto ml-sm-auto mb-3 mb-sm-0">
                <a href="{{ route('system.category.create') }}" class="btn btn-primary w-100 w-sm-auto"> <i class="fas fa-plus-circle mr-2"></i> Yeni Kataloq</a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-sm-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    {{-- <a href="#" class="breadcrumb-item">İstifadəçilər</a> --}}
                    <span class="breadcrumb-item active">Kataloqlar</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-sm-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Tree sorting</h6>
                <div class="header-elements">
                    <button type="button" class="btn btn-primary btn-sm sort-tree">Sort tree</button>
                    <button type="button" class="btn btn-success btn-sm sort-branch ml-3">Sort active</button>
                </div>
            </div>

            <div class="card-body">
                <div class="treeview w-20 border">
                    <h6 class="pt-3 pl-3">Folders</h6>
                    <hr>
                    <ul class="mb-1 pl-3 pb-2">
                      <li><i class="fas fa-angle-right rotate"></i>
                        <span><i class="far fa-envelope-open ic-w mx-1"></i>Mail</span>
                        <ul class="nested">
                          <li><i class="far fa-bell ic-w mr-1"></i>Offers</li>
                          <li><i class="far fa-address-book ic-w mr-1"></i>Contacts</li>
                          <li><i class="fas fa-angle-right rotate"></i>
                            <span><i class="far fa-calendar-alt ic-w mx-1"></i>Calendar</span>
                            <ul class="nested">
                              <li><i class="far fa-clock ic-w mr-1"></i>Deadlines</li>
                              <li><i class="fas fa-users ic-w mr-1"></i>Meetings</li>
                              <li><i class="fas fa-basketball-ball ic-w mr-1"></i>Workouts</li>
                              <li><i class="fas fa-mug-hot ic-w mr-1"></i>Events</li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li><i class="fas fa-angle-right rotate"></i>
                        <span><i class="far fa-folder-open ic-w mx-1"></i>Inbox</span>
                        <ul class="nested">
                          <li><i class="far fa-folder-open ic-w mr-1"></i>Admin</li>
                          <li><i class="far fa-folder-open ic-w mr-1"></i>Corporate</li>
                          <li><i class="far fa-folder-open ic-w mr-1"></i>Finance</li>
                          <li><i class="far fa-folder-open ic-w mr-1"></i>Other</li>
                        </ul>
                      </li>
                      <li><i class="fas fa-angle-right rotate"></i>
                        <span><i class="far fa-gem ic-w mx-1"></i>Favourites</span>
                        <ul class="nested">
                            <li><i class="fas fa-pepper-hot ic-w mr-1"></i>Restaurants</li>
                            <li><i class="far fa-eye ic-w mr-1"></i>Places</li>
                            <li><i class="fas fa-gamepad ic-w mr-1"></i>Games</li>
                            <li><i class="fas fa-cocktail ic-w mr-1"></i>Coctails</li>
                            <li><i class="fas fa-pizza-slice ic-w mr-1"></i>Food</li>
                          </ul>
                      </li>
                      <li><i class="far fa-comment ic-w mr-1"></i>Notes</li>
                      <li><i class="fas fa-cogs ic-w mr-1"></i>Settings</li>
                      <li><i class="fas fa-desktop ic-w mr-1"></i>Devices</li>
                      <li><i class="fas fa-trash-alt ic-w mr-1"></i>Deleted Items</li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>
@endsection
@section('_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js" integrity="sha512-Hyk+1XSRfagqzuSHE8M856g295mX1i5rfSV5yRugcYFlvQiE3BKgg5oFRfX45s7I8qzMYFa8gbFy9xMFbX7Lqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="{{ _adminJs('plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ _adminJs('plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ _adminJs('app.js') }}"></script>
    <script src="{{ _adminJs('demo_pages/datatables_responsive.js') }}"></script> --}}

@endsection

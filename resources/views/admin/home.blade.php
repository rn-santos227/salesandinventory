@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
    @include('layouts.menu')
    
=======
<div class="container-fluid">
    @include('admin.sidenave')
    @include('admin.main')
</div>
>>>>>>> refs/remotes/origin/master
=======
  @include('layouts.menu')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-0">
        <div class="nav-side-menu submenu">
          @include('admin.sidenav')
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      @yield('page')
    </div>
  </div>
>>>>>>> refs/remotes/origin/master
@endsection

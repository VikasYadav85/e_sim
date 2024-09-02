@php
$configData = Helper::applClasses();

$Createpermission  = Auth::user()->can('Create permission');
$GivePermission  = Auth::user()->can('Give Permission');
$DeletePermission  = Auth::user()->can('Delete Permission');
$EditPermission  = Auth::user()->can('Edit Permission');
$DeleteRole  = Auth::user()->can('Delete Role');
$CreateRole	  = Auth::user()->can('Create Role');
$EditRole  = Auth::user()->can('Edit Role');
$EditUser  = Auth::user()->can('Edit User');
$ViewUser  = Auth::user()->can('View User');
$DeleteUser  = Auth::user()->can('Delete User');
$CreateUser  = Auth::user()->can('Create User');
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="{{ url('/') }}">
           <img src="{{ asset('assets1/imgs/logo.png') }}" alt="" class="ft-logo"  style="margin-left: 48px;"/>
          </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
            data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="margin-top: 67px;">

       <li class="nav-item " style="" data-menu="dashboard">
         <a href="{{route('dashboard')}}" class="d-flex align-items-center" target="_self">
              <i data-feather='circle'></i>
              <span class="menu-title text-truncate">Dashboard</span>
            </a>
        </li>

        <li class="nav-item has-sub" style="" data-menu="home">
          <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather='home'></i>
          <span class="menu-title text-truncate">Order</span>
         </a>
         <ul class="menu-content">
            <ul class="menu-content">

              <li class="nav-item" data-menu="order-list">
                <a href="{{route('order-list')}}" class="d-flex align-items-center" >
                <i data-feather='check-circle'></i>  <span class="menu-item text-truncate"> Order</span>
                </a>
                </li>

          <li class="nav-item" data-menu="top-up-order-list">
           <a href="{{route('top-up-order-list')}}" class="d-flex align-items-center" >
           <i data-feather='check-circle'></i>  <span class="menu-item text-truncate">Top Up Order</span>
           </a>
           </li>


        </ul>

       </ul>
     </li>



<!-- end -->

      <li class="nav-item " style="" data-menu="country">
         <a href="{{route('country')}}" class="d-flex align-items-center" target="_self">
          <i data-feather='circle'></i>
          <span class="menu-title text-truncate">Country</span>
        </a>
      </li>
      <li class="nav-item " style="" data-menu="index_e_sim_plan">
         <a href="{{ route('index_e_sim_plan') }}" class="d-flex align-items-center" target="_self">
          <i data-feather='circle'></i>
          <span class="menu-title text-truncate">E-SIM Plan</span>
        </a>
      </li>

      <li class="nav-item " style="" data-menu="index_package">
         <a href="{{ route('index_package') }}" class="d-flex align-items-center" target="_self">
          <i data-feather='circle'></i>
          <span class="menu-title text-truncate">Package</span>
        </a>
      </li>

      <li class="nav-item " style="" data-menu="index_esims">
         <a href="{{ route('index_esims') }}" class="d-flex align-items-center" target="_self">
          <i data-feather='circle'></i>
          <span class="menu-title text-truncate">E-SIM s</span>
        </a>
      </li>

      <li class="nav-item " style="" data-menu="compatible-devices">
        <a href="{{ route('compatible-devices') }}" class="d-flex align-items-center" target="_self">
         <i data-feather='circle'></i>
         <span class="menu-title text-truncate">Compatible Devices</span>
       </a>
     </li>
     @if($Createpermission||$GivePermission || $DeletePermission || $EditPermission || $DeleteRole || $CreateRole	||  $EditRole || $EditUser || $ViewUser|| $DeleteUser ||$CreateUser )

    <li class="nav-item has-sub" style="" data-menu="Permission1">
      <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
      <i data-feather='home'></i>
      <span class="menu-title text-truncate">Role Permission</span>
     </a>

     <ul class="menu-content">
        <ul class="menu-content">
     @if($Createpermission|| $DeletePermission || $EditPermission)
          <li class="nav-item" data-menu="permissions">
            <a href="{{url('admin/permissions')}}" class="d-flex align-items-center" >
            <i data-feather='check-circle'></i>  <span class="menu-item text-truncate">Permission</span>
            </a>
            </li>
@endif
@if($DeleteRole || $CreateRole	||  $EditRole ||$GivePermission )
      <li class="nav-item" data-menu="role">
       <a href="{{url('admin/roles')}}" class="d-flex align-items-center" >
       <i data-feather='check-circle'></i>  <span class="menu-item text-truncate">Role</span>
       </a>
       </li>
@endif
@if($EditUser || $ViewUser|| $DeleteUser ||$CreateUser)
       <li class="nav-item" data-menu="user-index">
          <a href="{{route('user-index')}}" class="d-flex align-items-center" >
          <i data-feather='check-circle'></i>  <span class="menu-item text-truncate">User</span>
          </a>
          </li>
@endif
@endif


    </ul>

  </div>
</div>
<!-- END: Main Menu-->
  <script>
  $(document).ready(function() {
    var activeMenuItem = localStorage.getItem('activeMenuItem');
    var activeMenuItem1 = localStorage.getItem('activeMenuItem');

    if (activeMenuItem) {
        $('.menu-content .nav-item').removeClass('active');
        $('.menu-content .nav-item').filter('[data-menu="' + activeMenuItem + '"]').addClass('active');
    }


  if (activeMenuItem1) {
      $('.navigation-main .nav-item').removeClass('active');
      $('.navigation-main .nav-item').filter('[data-menu="' + activeMenuItem1 + '"]').addClass('active');
  }

  $('.navigation-main .nav-item').on('click', function(e) {

      if ($(this).hasClass('has-sub')) {

            $('.menu-content .nav-item').on('click', function(e) {
            $('.menu-content .nav-item').removeClass('active');

            $(this).addClass('active');

            var activeMenuItem = $(this).attr('data-menu');

            localStorage.setItem('activeMenuItem', activeMenuItem);

            $(this).closest('.nav-item.has-sub').find('> a').addClass('active');
        });

        } else {
            $('.navigation-main .nav-item').removeClass('active');

            $(this).addClass('active');

            var activeMenuItem1 = $(this).attr('data-menu');
            localStorage.setItem('activeMenuItem', activeMenuItem1);

        }

      //  $(this).closest('.nav-item.has-sub').find('> a').addClass('active');
      $(this).closest('.nav-item').find('> a').addClass('active');
  });


});

</script>

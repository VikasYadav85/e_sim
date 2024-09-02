@extends('layouts/contentLayoutMaster')
@section('title', 'Role')
@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

@if(Session::has('successMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('successMessage') }}">
@elseif(Session::has('alertMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('alertMessage') }}">
@endif
 <style>
label{
  color: #080808;
    font-weight: bold;
}
</style>
<!-- Basic Tables start -->
<div class="row" id="basic-table">
  <input type="hidden" name="" id="app_url" value="{{env('APP_URL')}}">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Role Permission</h4>

      </div>
    </div>
  </div>
  <div class="card-body">
  </div>

  <form class="form form-vertical" role="form" action="{{ url('admin/roles/'.$Role->id.'/updatepermissiontorole') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6">
            <div class="mb-1">
                <label class="form-label" for="role">Role</label>
                <p  class="form-control" @readonly(true)>{{ $Role->name }}</p>

            </div>
        </div>
    </div>
<br><br>

     {{--  <div class="row">
        @foreach($Permission as $permission)
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input"   value="{{ $permission->name }}" name="permissions[]"
                  {{ in_array($permission->id ,$rolepermissions) ? 'checked':'' }}
                    >
                    <label class="form-check-label" >{{ $permission->name }}</label>
                </div>
            </div>
        @endforeach
    </div>    --}}

  <div class="row">
    <h3 class="card-title">Dashboard </h3>
    <hr>

    <div class="col-md-3">
        <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input" value="Dashboard"
                   {{ in_array(90, $rolepermissions) ? 'checked' : '' }}
                   name="permissions[]">
            <label class="form-check-label">Dashboard</label>
        </div>
    </div>
</div>


    <hr>
{{--    Role  --}}

      <div class="row">
    <h3 class="card-title">Role  </h3>
    <hr>

     <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input roleclass"
                       {{ array_intersect([2, 10, 11, 12], $rolepermissions) === [2, 10, 11, 12] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

    <div class="col-md-3">
        <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input roleclasss" value="Create Role"
                   {{ in_array(10, $rolepermissions) ? 'checked' : '' }}
                   name="permissions[]">
            <label class="form-check-label">Create Role</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input roleclasss" value="Edit Role"
                   {{ in_array(2, $rolepermissions) ? 'checked' : '' }}
                   name="permissions[]">
            <label class="form-check-label">Edit Role</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input roleclasss" value="Delete Role"
                   {{ in_array(11, $rolepermissions) ? 'checked' : '' }}
                   name="permissions[]">
            <label class="form-check-label">Delete Role</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input roleclasss" value="Give Permission"
                   {{ in_array(12, $rolepermissions) ? 'checked' : '' }}
                   name="permissions[]">
            <label class="form-check-label">Give Permission</label>
        </div>
    </div>

</div>

   {{--  permission  --}}

     <hr>
    <div class="row">
        <h3 class="card-title">Permission</h3>
        <hr>

        <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Permissionsc"
                       {{ array_intersect([13, 8, 9], $rolepermissions) === [13, 8, 9] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Permissionscs" value="Create permission" name="permissions[]"
                       {{ in_array(13, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Create permission</label>
                </div>
            </div>
          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Permissionscs" value="Edit Permission" name="permissions[]"
                       {{ in_array(8, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Edit Permission</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Permissionscs" value="Delete Permission" name="permissions[]"
                       {{ in_array(9, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Permission</label>
                </div>
            </div>
    </div>

{{--  user    --}}

 <hr>
    <div class="row">
        <h3 class="card-title">User</h3>
        <hr>

           <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Userclass"
                       {{ array_intersect([1,14,5,3], $rolepermissions) === [1,14,5,3] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Userclasss" value="Create User" name="permissions[]"
                       {{ in_array(1, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create User</label>
                </div>
            </div>
          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Userclasss" value="Edit User" name="permissions[]"
                       {{ in_array(14, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit User</label>
                </div>
            </div>
               <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Userclasss" value="View User" name="permissions[]"
                       {{ in_array(5, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View User</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Userclasss" value="Delete User" name="permissions[]"
                       {{ in_array(3, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete User</label>
                </div>
            </div>
    </div>



{{--  Home    --}}

 <hr>
    <div class="row">
        <h3 class="card-title">Home </h3>
        <hr>

         <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclass"
                       {{ array_intersect([16,15,18,17,19,20,21,29,30,32,33,22,23,25,24,26,27,28], $rolepermissions) === [16,15,18,17,19,20,21,29,30,32,33,22,23,25,24,26,27,28] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Create Home Banner" name="permissions[]"
                       {{ in_array(16, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Banner</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Edit Home Banner" name="permissions[]"
                       {{ in_array(15, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Banner</label>
                </div>
            </div>


               <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="View Home Banner" name="permissions[]"
                       {{ in_array(18, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Banner</label>
                </div>
            </div>
                 <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Delete Home Banner" name="permissions[]"
                       {{ in_array(17, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Banner</label>
                </div>
            </div>

          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home About" name="permissions[]"
                       {{ in_array(19, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >About</label>
                </div>
            </div>    <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Sustainability" name="permissions[]"
                       {{ in_array(20, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Sustainability</label>
                </div>
            </div>

              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Career" name="permissions[]"
                       {{ in_array(21, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Career</label>
                </div>
            </div>    <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Brand Banner" name="permissions[]"
                       {{ in_array(29, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Brand Banner</label>
                </div>
            </div>


             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Brand Create" name="permissions[]"
                       {{ in_array(30, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Brand Create</label>
                </div>
            </div>    <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Brand Edit" name="permissions[]"
                       {{ in_array(31, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Brand Edit</label>
                </div>
            </div>    <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Brand Delete" name="permissions[]"
                       {{ in_array(32, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Brand Delete</label>
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Home Brand View" name="permissions[]"
                       {{ in_array(33, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Brand View</label>
                </div>
            </div>




             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Create Product" name="permissions[]"
                       {{ in_array(22, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Product</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Edit Product" name="permissions[]"
                       {{ in_array(23, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Product</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="View Product" name="permissions[]"
                       {{ in_array(25, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Product</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Delete Product" name="permissions[]"
                       {{ in_array(24, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Product</label>
                </div>
            </div>


             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Create Plant" name="permissions[]"
                       {{ in_array(26, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Plant</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Edit Plant" name="permissions[]"
                       {{ in_array(27, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Plant</label>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Homeclasss" value="Delete Plant" name="permissions[]"
                       {{ in_array(28, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Plant</label>
                </div>
            </div>




    </div>


{{--  Who We Are    --}}

 <hr>
    <div class="row">
        <h3 class="card-title">Who We Are</h3>
        <hr>

         <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAre"
                       {{ array_intersect([34,35,36,37,38,39,40,41,42,43,44,45,46,47,48], $rolepermissions) === [34,35,36,37,38,39,40,41,42,43,44,45,46,47,48] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Who We Are Banner" name="permissions[]"
                       {{ in_array(34, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Banner</label>
                </div>
            </div>
          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Create Gallery" name="permissions[]"
                       {{ in_array(35, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Gallery</label>
                </div>
            </div>
               <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Edit Gallery" name="permissions[]"
                       {{ in_array(36, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Gallery</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Delete Gallery" name="permissions[]"
                       {{ in_array(37, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Gallery</label>
                </div>
            </div>

                        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Create Our Journey" name="permissions[]"
                       {{ in_array(38, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Our Journey</label>
                </div>
            </div>
                        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Edit Our Journey" name="permissions[]"
                       {{ in_array(39, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Our Journey</label>
                </div>
            </div>
                        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Delete Our Journey" name="permissions[]"
                       {{ in_array(40, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Our Journey</label>
                </div>
            </div>
                        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="View Our Journey" name="permissions[]"
                       {{ in_array(41, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Our Journey</label>
                </div>
            </div>
                        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Create Awards" name="permissions[]"
                       {{ in_array(42, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Awards</label>
                </div>
            </div>


              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Edit Awards" name="permissions[]"
                       {{ in_array(43, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Awards</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Delete Awards" name="permissions[]"
                       {{ in_array(44, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Awards</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="View Awards" name="permissions[]"
                       {{ in_array(45, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Awards</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Our Vision" name="permissions[]"
                       {{ in_array(46, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Our Vision</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Our Mission" name="permissions[]"
                       {{ in_array(47, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Our Mission</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input WhoWeAres" value="Our Value" name="permissions[]"
                       {{ in_array(48, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Our Value</label>
                </div>
            </div>

    </div>


{{--    Sustainability   --}}

    <hr>
    <div class="row">
        <h3 class="card-title">Sustainability </h3>
        <hr>
   <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectSustainability"
                       {{ array_intersect([49,50,51,52], $rolepermissions) === [49,50,51,52] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectSustainabilitys" value="Create Sustainability" name="permissions[]"
                       {{ in_array(49, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Create Sustainability</label>
                </div>
            </div>
          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectSustainabilitys" value="Edit Sustainability" name="permissions[]"
                       {{ in_array(50, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Edit Sustainability</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectSustainabilitys" value="Delete Sustainability" name="permissions[]"
                       {{ in_array(51, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Sustainability</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectSustainabilitys" value="View Sustainability" name="permissions[]"
                       {{ in_array(52, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Sustainability</label>
                </div>
            </div>
    </div>



{{--    Career    --}}

    <hr>
    <div class="row">
        <h3 class="card-title">Career </h3>
        <hr>


      <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareer"
                       {{ array_intersect([53,54,55,56,57,58,59,60,61,63,64,65,66,67,68,69,70], $rolepermissions) === [53,54,55,56,57,58,59,60,61,63,64,65,66,67,68,69,70] ? 'checked' : '' }}>
        <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Create Career" name="permissions[]"
                       {{ in_array(53, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Create Career</label>
                </div>
            </div>
          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Edit Career" name="permissions[]"
                       {{ in_array(54, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Edit Career</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Delete Career" name="permissions[]"
                       {{ in_array(55, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Career</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="View Career" name="permissions[]"
                       {{ in_array(56, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Career</label>
                </div>
            </div>

                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Career Banner" name="permissions[]"
                       {{ in_array(57, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Career Banner</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Job Banner" name="permissions[]"
                       {{ in_array(58, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Job Banner</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Craete Department" name="permissions[]"
                       {{ in_array(59, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Craete Department</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Edit Department" name="permissions[]"
                       {{ in_array(60, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Department</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Delete Department" name="permissions[]"
                       {{ in_array(61, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Department</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Create Qualification" name="permissions[]"
                       {{ in_array(63, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Qualification</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Edit Qualification" name="permissions[]"
                       {{ in_array(64, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Qualification</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Delete Qualification" name="permissions[]"
                       {{ in_array(65, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Qualification</label>
                </div>
            </div>
                         <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Create Job" name="permissions[]"
                       {{ in_array(66, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Create Job</label>
                </div>
            </div>

              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Edit Job" name="permissions[]"
                       {{ in_array(67, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit Job</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="View Job" name="permissions[]"
                       {{ in_array(68, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View Job</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Delete Job" name="permissions[]"
                       {{ in_array(69, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete Job</label>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectCareers" value="Candidate View" name="permissions[]"
                       {{ in_array(70, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Candidate View</label>
                </div>
            </div>
    </div>



{{--    Team  --}}

    <hr>
    <div class="row">
        <h3 class="card-title">Our Team</h3>
        <hr>


      <div class="row">
        <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteam"
                       {{ array_intersect([71,72,73,74,75], $rolepermissions) === [71,72,73,74,75] ? 'checked' : '' }}>
              <label class="form-check-label" >All </label>
                </div>
            </div>
        </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteams" value="Create Team Banner" name="permissions[]"
                       {{ in_array(71, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Banner</label>
                </div>
            </div>

          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteams" value="Carete Team" name="permissions[]"
                       {{ in_array(72, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Carete</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteams" value="Edit Our Team" name="permissions[]"
                       {{ in_array(73, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit </label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteams" value="View Our Team" name="permissions[]"
                       {{ in_array(75, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View </label>
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectteams" value="Delete Our Team" name="permissions[]"
                       {{ in_array(74, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete</label>
                </div>
            </div>


    </div>



{{--    Brand  --}}

    <hr>
    <div class="row">
        <h3 class="card-title"> Manage Brand </h3>
        <hr>
   <div class="row">
            <div class="col-md-3">
                    <div class="form-check mb-1">
                        <input type="checkbox" class="form-check-input allselectBrand"
                           {{ array_intersect([76, 77, 78, 79,80], $rolepermissions) === [76, 77, 78, 79,80] ? 'checked' : '' }}>
                <label class="form-check-label" >All </label>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectBrands" value="Brand Banner" name="permissions[]"
                       {{ in_array(76, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Banner</label>
                </div>
            </div>

          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectBrands" value="Create Brand" name="permissions[]"
                       {{ in_array(77, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Carete</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectBrands" value="Edit Barnd" name="permissions[]"
                       {{ in_array(78, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit </label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectBrands" value="View Brand" name="permissions[]"
                       {{ in_array(80, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View </label>
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input allselectBrands" value="Delete Brand" name="permissions[]"
                       {{ in_array(79, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete</label>
                </div>
            </div>


    </div>


{{--    Media   --}}

    <hr>
    <div class="row">
        <h3 class="card-title">Media </h3>
        <hr>
            <div class="row">
            <div class="col-md-3">
                    <div class="form-check mb-1">
                        <input type="checkbox" class="form-check-input allselectMedia"
                           {{ array_intersect([81, 82, 83, 84], $rolepermissions) === [81, 82, 83, 84] ? 'checked' : '' }}>
            <label class="form-check-label" >All </label>
                    </div>
                </div>
            </div>


          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input selectMedia" value="Craete Media" name="permissions[]"
                       {{ in_array(81, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Carete</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input selectMedia" value="Edit Media" name="permissions[]"
                       {{ in_array(82, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit </label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input selectMedia" value="View Media" name="permissions[]"
                       {{ in_array(84, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View </label>
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input selectMedia" value="Delete Media" name="permissions[]"
                       {{ in_array(83, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete</label>
                </div>
            </div>


    </div>



{{--    Privacy Center   --}}

    <hr>
    <div class="row">
        <h3 class="card-title"> Privacy Center </h3>
        <hr>


         <div class="row">
     <div class="col-md-3">
         <div class="form-check mb-1">
            <input type="checkbox" class="form-check-input allselect"
             {{ array_intersect([86, 87, 88, 89], $rolepermissions) === [86, 87, 88, 89] ? 'checked' : '' }} >
           <label class="form-check-label" >All </label>
          </div>
         </div>
    </div>

          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Privacyid" value="Create Privacy Center" name="permissions[]"
                       {{ in_array(86, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Create</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Privacyid" value="Edit Privacy Center" name="permissions[]"
                       {{ in_array(87, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Edit </label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Privacyid" value="View Privacy Center" name="permissions[]"
                       {{ in_array(88, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >View </label>
                </div>
            </div>

             <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input Privacyid" value="Delete Privacy Center" name="permissions[]"
                       {{ in_array(89, $rolepermissions) ? 'checked' : '' }} >
                    <label class="form-check-label" >Delete</label>
                </div>
            </div>


    </div>



{{--    Create Terms   --}}

    <hr>
    <div class="row">
        <h3 class="card-title"> Terms</h3>
        <hr>

          <div class="col-md-3">
                <div class="form-check mb-1">
                    <input type="checkbox" class="form-check-input" value="Create Terms" name="permissions[]"
                       {{ in_array(85, $rolepermissions) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" >Terms</label>
                </div>
            </div>
    </div>






    <div class="col-12 text-center mt-3">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
    </div>
</form>

  <div class="card-body">
    <div class="demo-inline-spacing">
      <div class="form-modal-ex">
        <!-- Button trigger modal -->
      </div>
    </div>
  </div>
</div>
<!-- Basic Tables end -->

<link href="http://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
  $('#dataTableExample1').DataTable({order:[]});

</script>


@endsection

@section('page-script')
<!-- Page js files -->
<script src="jquery-3.6.4.min.js"></script>

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
  var jq = $.noConflict();
jq(document).ready(function(){

	@if(Session::has('successMessage'))
			var toster=jq('#toster_id').val();
			if(toster!=''){
			Swal.fire({

			icon: 'success',
			title: ''+toster,
			showConfirmButton: false,
			timer: 2000
			})
			}

			{{ Session::forget('successMessage') }}

      @elseif(Session::has('alertMessage'))
			var toster=jq('#toster_id').val();
			if(toster != ''){
			Swal.fire({

			icon: 'warning',
			title: ''+toster,
			showConfirmButton: false,
			timer: 4000
			})
			}
			{{ Session::forget('alertMessage') }}

		@endif
});

  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{--  privecy center   --}}
  <script>
 $(document).ready(function() {
    $('.allselect').click(function() {
        var isChecked = $(this).prop('checked');
        $('.Privacyid[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.Privacyid[name="permissions[]"]').click(function() {
        var allChecked = $('.Privacyid[name="permissions[]"]').length === $('.Privacyid[name="permissions[]"]:checked').length;
        $('.allselect').prop('checked', allChecked);
    });
});
</script>


{{--  privecy center   --}}

  <script>
 $(document).ready(function() {
    $('.allselectMedia').click(function() {
        var isChecked = $(this).prop('checked');
        $('.selectMedia[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.selectMedia[name="permissions[]"]').click(function() {
        var allChecked = $('.selectMedia[name="permissions[]"]').length === $('.selectMedia[name="permissions[]"]:checked').length;
        $('.allselectMedia').prop('checked', allChecked);
    });
});
</script>


{{--  Manage Brand    --}}

  <script>
 $(document).ready(function() {
    $('.allselectBrand').click(function() {
        var isChecked = $(this).prop('checked');
        $('.allselectBrands[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.allselectBrands[name="permissions[]"]').click(function() {
        var allChecked = $('.allselectBrands[name="permissions[]"]').length === $('.allselectBrands[name="permissions[]"]:checked').length;
        $('.allselectBrand').prop('checked', allChecked);
    });
});
</script>
{{--  selewct all team  --}}
  <script>
 $(document).ready(function() {
    $('.allselectteam').click(function() {
        var isChecked = $(this).prop('checked');
        $('.allselectteams[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.allselectteams[name="permissions[]"]').click(function() {
        var allChecked = $('.allselectteams[name="permissions[]"]').length === $('.allselectteams[name="permissions[]"]:checked').length;
        $('.allselectteam').prop('checked', allChecked);
    });
});
</script>

{{--  career   --}}
  <script>
 $(document).ready(function() {
    $('.allselectCareer').click(function() {
        var isChecked = $(this).prop('checked');
        $('.allselectCareers[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.allselectCareers[name="permissions[]"]').click(function() {
        var allChecked = $('.allselectCareers[name="permissions[]"]').length === $('.allselectCareers[name="permissions[]"]:checked').length;
        $('.allselectCareer').prop('checked', allChecked);
    });
});
</script>

{{--  Sustainability --}}
  <script>
 $(document).ready(function() {
    $('.allselectSustainability').click(function() {
        var isChecked = $(this).prop('checked');
        $('.allselectSustainabilitys[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.allselectSustainabilitys[name="permissions[]"]').click(function() {
        var allChecked = $('.allselectSustainabilitys[name="permissions[]"]').length === $('.allselectSustainabilitys[name="permissions[]"]:checked').length;
        $('.allselectSustainability').prop('checked', allChecked);
    });
});
</script>

{{--  Who We Are --}}
  <script>
 $(document).ready(function() {
    $('.WhoWeAre').click(function() {
        var isChecked = $(this).prop('checked');
        $('.WhoWeAres[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.WhoWeAres[name="permissions[]"]').click(function() {
        var allChecked = $('.WhoWeAres[name="permissions[]"]').length === $('.WhoWeAres[name="permissions[]"]:checked').length;
        $('.WhoWeAre').prop('checked', allChecked);
    });
});
</script>

{{--  home all select --}}
  <script>
 $(document).ready(function() {
    $('.Homeclass').click(function() {
        var isChecked = $(this).prop('checked');
        $('.Homeclasss[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.Homeclasss[name="permissions[]"]').click(function() {
        var allChecked = $('.Homeclasss[name="permissions[]"]').length === $('.Homeclasss[name="permissions[]"]:checked').length;
        $('.Homeclass').prop('checked', allChecked);
    });
});
</script>


{{--  User all select --}}
  <script>
 $(document).ready(function() {
    $('.Userclass').click(function() {
        var isChecked = $(this).prop('checked');
        $('.Userclasss[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.Userclasss[name="permissions[]"]').click(function() {
        var allChecked = $('.Userclasss[name="permissions[]"]').length === $('.Userclasss[name="permissions[]"]:checked').length;
        $('.Userclass').prop('checked', allChecked);
    });
});
</script>

{{--  Permission all select --}}
  <script>
 $(document).ready(function() {
    $('.Permissionsc').click(function() {
        var isChecked = $(this).prop('checked');
        $('.Permissionscs[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.Permissionscs[name="permissions[]"]').click(function() {
        var allChecked = $('.Permissionscs[name="permissions[]"]').length === $('.Permissionscs[name="permissions[]"]:checked').length;
        $('.Permissionsc').prop('checked', allChecked);
    });
});
</script>

{{--  Permission all select --}}
  <script>
 $(document).ready(function() {
    $('.roleclass').click(function() {
        var isChecked = $(this).prop('checked');
        $('.roleclasss[name="permissions[]"]').prop('checked', isChecked);
    });

    $('.roleclasss[name="permissions[]"]').click(function() {
        var allChecked = $('.roleclasss[name="permissions[]"]').length === $('.roleclasss[name="permissions[]"]:checked').length;
        $('.roleclass').prop('checked', allChecked);
    });
});
</script>

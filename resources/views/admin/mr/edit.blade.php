@extends('admin.layout')
@section('content')
<style>
    table thead {
        background-color: black;
        color: white;
    }
</style>

 <div class="row">

    <div class="row">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Edit MR</h4>
                        <div class="flex-shrink-0">

                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">

                        <div class="live-preview">
                            <form action="{{route('mr.update',$mrinfo->id)}}" id="companyadmin" method="post">
                                @csrf()
                                <div class="row">

                                    @php 


                                    $maanagerIfAlloted =  DB::table('allotmanagers')->where('mr_id',$mrinfo->id)->first();

                                    @endphp
                                    

                                    <!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">
                                              Select Manager  </label>
                                              <select class="form-control" onchange="changecolor()" name="manager_id">
                                                @if(!empty($manager))
                                                    <option  value="">Choose Manager</option>
                                                @foreach($manager as $managerlist)
                                                    
                                                    <option value="{{$managerlist->id}}" @if(!empty($maanagerIfAlloted))@if($maanagerIfAlloted->manager_id == $managerlist->id ) 
                                                        selected @endif() @endif()>{{$managerlist->name ?? ''}}</option>
                                                    @endforeach()

                                                    @endif()

                                              </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="compnayNameinput" class="form-label">
                                               MR  Name</label>
                                            <input type="text" onkeydown="changecolor()" value="{{$mrinfo->name ?? ''}}" class="form-control" name="name" placeholder="Enter MR Name" id="nameinput">
                                            <div class="error-message" id="name-error"></div>

                                        </div>
                                    </div>
                                    <!--end col-->
                                   
                                    <!--end col-->


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="tel" onkeydown="changecolor()"  value="{{$mrinfo->phone ?? ''}}" class="form-control" name="phone" placeholder="Enter mobile number" id="phonenumberInput">
                                            <div class="error-message" id="phone-error"></div>

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="emailidInput" class="form-label">Email
                                                Address</label>
                                            <input type="email" onkeydown="changecolor()" value="{{$mrinfo->email ?? ''}}"  class="form-control" name="email" placeholder="example@gmail.com" id="emailidInput">
                                            <div class="error-message" id="email-error"></div>


                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="ForminputState" class="form-label">Password</label>
                                            <input type="text" onkeydown="changecolor()" class="form-control" name="password" placeholder="Password" id="emailidInput">
                                            <div class="error-message" id="password-error"></div>

                                        </div>
                                    </div>
                                    <!--end col-->

                                    <!--end col-->
                                   
                                    <input type="hidden"  value="mr" name="role">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="emailidInput" class="form-label">Work Area</label>
                                            <textarea onkeydown="changecolor()"  type="text" class="form-control" name="work_area" placeholder="Enter Work Area" id="work_area">{{$mrinfo->work_area ?? ''}}</textarea>
                                            <div class="error-message" id="work_area-error"></div>

                                        </div>
                                    </div>
                                    
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-start">
                                        <div class="text-success" id="success"></div>
                                        <div class="text-danger" id="password-error"></div>

                                            <button type="submit" class="btn btn-dark" id="changetext">Submit</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                           
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->


        </div>
    </div>
</div> <!-- end col -->
</div>
<!-- end col -->

<script src="{{asset('admin/js/ajax/mrcreate.js')}}"></script>


</div>
@endsection
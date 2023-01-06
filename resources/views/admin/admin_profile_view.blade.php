@extends('admin.admin_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <br>
                    <center>
                    <img class="rounded-circle avatar-xl centered" src="{{ asset('upload/admin_images/'.$adminData->profile_image) }}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                        <hr>
                        <h4 class="card-title">Created: {{ $adminData->created_at->diffForHumans() }}</h4>
                        <hr>
                        <a href="{{ route('admin.edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                        
                    </div>
                </div>
            </div>           

        </div>
        <!-- end row -->


    </div>
</div>


@endsection
<!-- End Page-content -->
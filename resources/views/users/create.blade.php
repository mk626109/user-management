@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="content-wrapper">
    <div class="p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <!-- <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3>Users</h3>
                    </div>
                </div> -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" id="create_emp" method="post">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Name</label>
                                <input name="name" id="emp_name" placeholder="Enter Your Name" type="text"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="emp_email" placeholder="Enter Your Email" type="email"
                                    class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Password</label>
                                <input name="password" id="password" placeholder="Enter your Password"
                                    type="password" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="mt-1 btn btn-primary">Create</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function UserComponent() {
        return {
            userListingRoute: "{{ route('users.listing') }}",
            users: [],
            init: function() {
                fetch(this.userListingRoute)
                .then(data => data.json())
                .then(users => {
                    this.users = users.data;
                })
            },
        }
    }
</script>
@endsection
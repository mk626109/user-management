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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h2>Welcome {{ Auth::user()->name; }}</h2>
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
            userListingRoute: "{{ route('users.index') }}",
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
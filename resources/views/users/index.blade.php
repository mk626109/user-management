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
                        <h3 class="card-title">Users Listing</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" x-data="UserComponent()" x-init="init()">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="user in users">
                                    <tr>
                                        <td x-text="user.name">Name</td>
                                        <td x-text="user.email">Email</td>
                                        <td>
                                            <a :href="editUserUrl(user.id)" class="btn btn-primary">Edit</a>
                                            <a href="#" x-on:click="deleteUserUrl(user.id)" class="btn btn-primary">Delete</a>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
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
            editUserUrl: function(userId) {
                return "{{ url('users') }}/" + userId + "/edit";
            },
            deleteUserUrl: function(userId) {
                let deleteUrl = "{{ route('users.destroy', '') }}/" + userId;

                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "{{ route('users.index') }}";
                    } else {
                        console.error('Failed to delete user');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    }
</script>
@endsection
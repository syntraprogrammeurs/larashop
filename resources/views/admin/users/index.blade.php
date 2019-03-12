@extends('layouts.dashboard')
@if(Session::has('deleted_user'))
    <p class="bg-danger">{{session('deleted_user')}}</p>
@endif
@section('content')
    <h1>Users</h1>
    <table id="table_id" class="display">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)

                <tr>

                    <td>{{$user->id}}</td>
                    <td><img height="50"
                             src="{{$user->photo ? asset($user->photo->file) : 'http://placehold.it/400x400'}}"
                             alt="">
                    </td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'User without role'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}



                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>

                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
           {{ $users->render()}}
        </div>
    </div>
@endsection

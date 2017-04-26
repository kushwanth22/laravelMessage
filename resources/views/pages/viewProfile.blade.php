@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-8 col-md-offset-2" style="background-color: #b8bac6">
      <h2>Check Your Profile <b>{{ $user->name }}</b> </h2>

        <table class="table table-striped ">
            <thead>
                
            </thead>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection

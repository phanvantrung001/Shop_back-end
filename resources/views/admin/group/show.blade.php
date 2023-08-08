@extends('admin.layout.master')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Group</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('group.index') }}" class='btn btn-primary'>Quay lại</a>
                    <a class="btn btn-primary " href="{{route('group.permission', $group->id)}}">Cấp Quyền</a>

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Chức vụ</th>
                                    <th>email</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->user as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->group->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class='btn btn-primary'>Edit</a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
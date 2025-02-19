@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-main-body">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Users List</h5>
            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Create User</a>
        </div>

        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table basic-border-table mb-0">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="text-primary-600">#{{ $i }}</a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->image_url!=null)
                                <img src="{{ asset('storage/' . $user->image_url) }}" height="50px" width="50px" alt="user_image">

                                @endif
                            </td>
                            <td>@if($user->status ==1)<span class="text-success">{{'Active'}}</span>@else<span class="text-danger">{{'InActive'}}</span>@endif</td>
                            <td class="">
                                <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>

                                <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>

                                <a title="Courier Rates" href="{{route('user-weight-slab',$user->id)}}" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="ic:round-settings" width="20" height="20"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="dt-layout-row">
                    <div class="dt-layout-cell dt-end">
                        <div class="dt-paging paging_full_numbers">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
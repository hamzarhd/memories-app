@extends('layouts.app', ['page' => __('User management'), 'pageSlug' => 'users'])

@section('content')
                        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href={{ route('users.add_user') }} class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
            </div>



            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="data-table">
                        <thead class=" text-primary">
                            <tr><th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                    <td> {{$user->name}}</td>
                                    <td>
                                        <a href="mailto:{{$user->email}}"> {{$user->email}}</a>
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-right">

                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                                                    <a class="dropdown-item" href="{{route('user.edit',$user->id)}}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="dropdown-item">Delete</button></form>
                                                                                                        </div>
                                            </div>
                                    </td>
                                </tr>  @endforeach
                                                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>

    </div>
</div>
                </div>



@endsection
@push('js')
    <script>
        $('#data-table').DataTable();

    </script>
    @endpush

@extends('layouts.app', ['page' => __('Souvenirs management'), 'pageSlug' => 'souvenirs'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Souvenirs</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href='{{ route('souvenirs.add_souvenir') }}' class="btn btn-sm btn-primary">Add souvenir</a>
                        </div>
                    </div>
                </div>



                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="data-table">
                            <thead class=" text-primary">
                            <tr><th scope="col">Name</th>
                                <th scope="col">Date souvenir</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                            @foreach($souvenirs as $souvenir)
                                <tr>
                                    <td> {{$souvenir->name}} </td>
                                    <td> {{$souvenir->souvenir_date}}</td>
                                    <td>{{$souvenir->created_at}}</td>
                                    <td class="text-right">

                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">


                                                <form action="{{ route('souvenirs.show',$souvenir->id) }}"> <button class="dropdown-item">Show Details</button></form>
 
                                                <a class="dropdown-item" href="{{route('souvenirs.edit',$souvenir->id)}}">Edit</a>

                                                        <a href="#deleteModal" data-href="{{route('souvenirs.destroy',$souvenir->id)}}" class="dropdown-item delete-modal" data-toggle="modal">Delete</a>

       
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
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">

                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this souvenir?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <form id="delete-form" method="post" action>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit"  class="btn btn-danger btn-ok" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script>
        $('#data-table').DataTable();

        $(".delete-modal").on("click", function () {
            document.getElementById('delete-form').action = $(this).data('href');

        });

        $(".confirm-modal").on("click", function () {
            document.getElementById('confirm-form').action = $(this).data('href');

        });
    </script>
    @endpush

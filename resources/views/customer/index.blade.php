<x-app-web-layout>
    <x-slot name='title'>
        Customer
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer
                            <a href="{{url('customer/create')}}" class="btn btn-primary float-end">Add Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="align-middle text-center">
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $customers as $item )
                                <tr class="align-middle text-center">
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" class="rounded" style="width:70px; height:70px;" alt="Img" />
                                    </td>
                                    <td>
                                        <a href="{{ url('customer/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                        <a
                                            href="{{ url('customer/'.$item->id.'/delete') }}"
                                            class="btn btn-danger mx-1"
                                            onclick="return confirm('Are you sure ?')"
                                        >
                                            Delete
                                        </a>
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
</x-app-web-layout>

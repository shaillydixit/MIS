@extends('layouts.master')

@section('content')

<Department/>

<!-- <div class="row">
    <div class="col-md-6">
        <h1>Departments</h1>
    </div>
    <div class="col-md-6">
        <a href="{{route('department.create')}}" class="btn btn-primary">
            Create New Department
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Director</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach($department as $row)
                <tbody>
                 
                    <td>{{$loop->index + 1}}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->director_id }}</td>
                    <td>
                        <div class="float-left mx-1">
                            <a href="{{ route('department.edit', $row->id) }}" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div class="float-left mx-1">
                            <form action="{{route('department.delete', $row->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div> -->
@endsection

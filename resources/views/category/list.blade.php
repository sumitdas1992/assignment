@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category List</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(!empty($list))
                        @foreach($list as $key => $value)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $value->category_name }}</td>
                            <td>{{ $value->is_active==1 ? 'Active' : 'In-active' }}</td>
                            <td><a href="{{ route('category-edit', $value->id) }}">Edit</a> | <a href="{{ route('category-delete',$value->id) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

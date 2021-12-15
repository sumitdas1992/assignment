@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                @if(isset($message) && $message)
                    <div class="alert alert-{{ $class }}" role="alert">{{ $message }}</div>
                @endif
           
            <div class="card">

                
                <div class="card-header">Add Category</div>

                <div class="card-body">
                
                    <form method="POST" action="{{ route('category-manage') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($category) && $category->id ? $category->id : ''}}"/>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <input id="category_name" type="category_name" class="form-control" value="{{ isset($category) && $category->category_name ? $category->category_name : ''}}" name="category_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">In-active</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

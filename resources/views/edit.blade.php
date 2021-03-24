@extends('layouts.app')
   
@section('content')
<div class="col-md-6">
                        <h3>Edit Category</h3>
                           <form method="POST" action="{{ route('update_category', $category) }}">
                        @csrf
                        {{ method_field('PUT') }}
                            
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $message }}</strong>
                                    </div>
                                @endif




                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                <div class="form-group">
                                <input type="text" name="title" class="form-control"  value="{{$category->title}}"placeholder="Category Name" required>
                                </div>

                                </div>


                                <div class="form-group">
                                    <button class="btn btn-success">Update</button>
                                </div>
                               </form>

                    </div>


@endsection
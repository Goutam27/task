@extends('layouts.app')
   
@section('content')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">     
        <div class="panel panel-primary">
            <div class="panel-heading">Category list Tree View </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Category List</h3>
                        <ul id="tree1">

                            @foreach($categories as $category)
                                <li class="list-group-item">
                                     <div class="d-flex justify-content-between">
                                    {{ $category->title }}  

                                   <div class="button-group d-flex">
                            <a type="button" href="{{ route('edit_cat',$category->id) }}"class="btn btn-sm btn-primary mr-1 edit-category" >Edit</a>

                            <form action="{{ route('delete_category',['id'=>$category->id, 'pid'=>$category->parent_id]) }}" method="POST">
                              @csrf
                              @method('DELETE')

                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                             <a type="button" href=""class="btn btn-sm btn-primary mr-1 edit-category" >Add Product</a>
                          </div>
                        </div>

                                   <div class="d-flex justify-content-between">
                                    @if(count($category->childs))
                                        @include('manageChild',['childs' => $category->childs])
                                    @endif
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> </div>
                    <div class="col-md-6">
                        <h3>Create a Category</h3>
                           <form method="post" action="{{ route('add_category') }}">
                            @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $message }}</strong>
                                    </div>
                                @endif


                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

                                    <div class="form-group">
                                    <select class="form-control" name="parent_id">
                                    <option value="">Select Main Category</option>

                                    @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                  
                                </div>


                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                <div class="form-group">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Category Name" required>
                                </div>

                                </div>


                                <div class="form-group">
                                    <button class="btn btn-success">Add New</button>
                                </div>
                               </form>

                    </div>
                </div>

                
            </div>
        </div>
    </div>
</body>
</html>
@endsection
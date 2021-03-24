
<ul>
@foreach($childs as $child)
	<li>
		 <div class="d-flex justify-content-between">
	    {{ $child->title }}
	    <div class="button-group d-flex">
                                    <a type="button" class="btn btn-sm btn-primary mr-1 edit-category" href="{{ route('edit_cat',$child->id)}}">Edit</a>

                                    <form action="{{route('delete_sub_category', $child->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')

                                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                     <a type="button" href=""class="btn btn-sm btn-primary mr-1 edit-category" >Add Product</a>
                                  </div>
                                </div>
	@if(count($child->childs))
            @include('manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</div>
</ul>
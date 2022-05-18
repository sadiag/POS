@extends('layouts.admin')
@section('title', 'Product List')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">                                                        
    
        <h3>Product List</h3>
        <a class="btn btn-primary float-right mb-4" href="{{route('products.create')}}">Create Product</a>
       
     <table class="table">
      <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Image</th>
             <th>Barcode</th>
             <th>Price</th>
             <th>Status</th>
             <th>Created At</th>
             <th>Updated At</th>
             <th>Actions</th>
</tr> 

</thead>
<tbody>
    @foreach ($products as $product)
    <tr>
            <td>{{$product->id}}</td>
             <td>{{$product->name}}</td>
             <td><img src="{{ Storage::url($product->image) }}" alt=""  width="100"></td>
             <td>{{$product->barcode}}</td>
             <td>{{$product->price}}</td>
             <td>
             <span class="right badge badge-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Active' : 'Inactive'}}</span>
            </td>
             <td>{{$product->created_at}}</td>
             <td>{{$product->updated_at}}</td>
             
   <td>
   <a href="{{ route('products.edit', $product) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

   <a href="{{ route('products.destroy', $product) }}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
</td>
</tr>
@endforeach
<tbody>
</table>
{{ $products->render() }}
</div>
</div>
@endsection
@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function (){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } 
})
        })
    })
    </script>
@endsection




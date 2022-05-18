@extends('layouts.admin')

@section('title', 'Edit product')
@section('content')

<h3>Edit Product</h3>
<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="form-group">

<label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
    id="name" placeholder="name" value="{{ old('name', $product->name) }}">
       @error('name')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
    id="description" placeholder="description" {{ old('description', $product->description) }}></textarea>
       @error('description')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <div class="custom-file">

    <input type="file" class="custom-file-input" name="image" id="image">
        <label class="custom-file-label" for="image">Choose file</label>
        <div>
       @error('image')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
    <label for="barcode">Barcode</label>
    <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror"
    id="barcode" placeholder="barcode" value="{{ old('barcode', $product->barcode) }}">
       @error('barcode')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
    id="price" placeholder="price" value="{{ old('price', $product->price) }}">
       @error('price')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror"
    id="status">
    <option value="1" {{old('status', $product->status) === 1 ? 'selected' : ''}}>Active</option>
    <option value="0" {{old('status', $product->status) === 0 ? 'selected' : ''}} >InActive</option>
</select>
       @error('status')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection

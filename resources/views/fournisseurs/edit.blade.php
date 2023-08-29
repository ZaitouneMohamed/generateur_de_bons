@extends('layout.master')

@section('content')
    <h1 class="text-center">Add New Fournisseur</h1>
    <form action="{{ route('fournisseur.update', $fournisseur->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">name :</label>
            <input type="text" class="form-control" name="name" value="{{ $fournisseur->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">email :</label>
            <input type="email" class="form-control" name="email" value="{{ $fournisseur->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">phone :</label>
            <input type="text" class="form-control" name="phone" value="{{ $fournisseur->phone }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">adresse :</label>
            <input type="text" class="form-control" name="adresse" value="{{ $fournisseur->adresse }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">categorie :</label>
            <input type="text" class="form-control" name="categorie" value="{{ $fournisseur->categorie }}">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
@endsection

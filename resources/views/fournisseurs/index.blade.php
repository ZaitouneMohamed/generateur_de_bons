@extends('layout.master')

@section('content')
    <div class="container">
        <h1 class="text-center">Add New Fournisseur</h1>
        <form action="{{route('fournisseur.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name :</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email :</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">phone :</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">adresse :</label>
                <input type="text" class="form-control" name="adresse">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">categorie :</label>
                <input type="text" class="form-control" name="categorie">
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
        <h1 class="text text-center">fournisseur list</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">adresse</th>
                    <th scope="col">categorie</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td scope="row">{{ $item->name }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">{{ $item->phone }}</td>
                        <td scope="row">{{ $item->adresse }}</td>
                        <td scope="row">{{ $item->categorie }}</td>
                        <td>
                            <a href="{{ route('fournisseur.edit', $item->id) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('fournisseur.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

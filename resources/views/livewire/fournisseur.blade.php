<div class="container" x-data="{ open: false }">
    <center>
        <button class="btn btn-primary" @click="open = true">Show Form</button>
        <button class="btn btn-primary" @click="open = false">Show Table</button>
    </center>
    <div x-show="open" x-transition>
        <h1 class="text-center">Add New Fournisseur</h1>
        <form wire:submit.prevent="add_fournisseur">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name :</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email :</label>
                <input type="email" class="form-control" wire:model="email">
                @error('email')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">phone :</label>
                <input type="text" class="form-control" wire:model="phone">
                @error('phone')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">adresse :</label>
                <input type="text" class="form-control" wire:model="adresse">
                @error('adresse')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">categorie :</label>
                <input type="text" class="form-control" wire:model="categorie">
                @error('categorie')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($editing)
                <a type="button" wire:click="update()" class="btn btn-warning">update</a>
                <a class="btn btn-danger" type="button" wire:click="cancel()">cancel</a>
            @else
                <button type="submit" class="btn btn-primary" @click="open = false">submit</button>
            @endif
        </form>
    </div>
    <div x-show="!open" x-transition>
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
                @foreach ($fournisseurs as $item)
                    <tr>
                        <td scope="row">{{ $item->name }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">{{ $item->phone }}</td>
                        <td scope="row">{{ $item->adresse }}</td>
                        <td scope="row">{{ $item->categorie }}</td>
                        <td>
                            <button wire:click="GetOne({{ $item->id }})" @click="open = true" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{ $item->id }})" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

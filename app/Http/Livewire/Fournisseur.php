<?php

namespace App\Http\Livewire;

use App\Models\Fournisseur as ModelsFournisseur;
use Livewire\Component;

class Fournisseur extends Component
{
    public $fournisseurs, $name, $phone, $adresse, $categorie, $email, $editing, $f_id;

    public function mount()
    {
        $this->GetList();
    }
    public function render()
    {
        return view('livewire.fournisseur');
    }

    public function GetList()
    {
        $this->fournisseurs = ModelsFournisseur::all();
    }

    public function clear()
    {
        $this->name = "";
        $this->phone = "";
        $this->adresse = "";
        $this->categorie = "";
        $this->email = "";
        $this->editing = false;
    }

    public function add_fournisseur()
    {
        $this->validate();
        ModelsFournisseur::create([
            "name" => $this->name,
            "phone" => $this->phone,
            "adresse" => $this->adresse,
            "categorie" => $this->categorie,
            "email" => $this->email,
        ]);
        $this->GetList();
        $this->clear();
    }
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        "phone" => "required",
        "adresse" => "required",
        "categorie" => "required"
    ];
    public function update()
    {
        $fournisseur = ModelsFournisseur::find($this->f_id);
        $fournisseur->update([
            "name" => $this->name,
            "phone" => $this->phone,
            "adresse" => $this->adresse,
            "categorie" => $this->categorie,
            "email" => $this->email,
        ]);
        $this->clear();
        $this->GetList();
    }
    public function delete($id)
    {
        ModelsFournisseur::destroy($id);
        $this->GetList();
    }
    public function GetOne($id)
    {
        $f = ModelsFournisseur::find($id);
        $this->f_id = $f->id;
        $this->name = $f->name;
        $this->email = $f->email;
        $this->adresse = $f->adresse;
        $this->phone = $f->phone;
        $this->categorie = $f->categorie;
        $this->editing = true;
    }
}

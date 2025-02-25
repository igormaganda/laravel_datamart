<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use App\Models\B2b;

class Recherche extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.recherche';
    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('query')
                ->label('Entrez votre recherche')
                ->placeholder('Recherche par titre ou contenu')
                ->required(),
            
        ]);
    }

    public function submitForm()
    {
        // Logique de recherche, tu peux filtrer les résultats avec une requête SQL
        $query = b2b::query();

        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        $count = $query->count();

        // Passe cette variable à la vue pour l'afficher dans un card
        $this->dispatchBrowserEvent('showSearchResult', ['count' => $count]);
    }
}

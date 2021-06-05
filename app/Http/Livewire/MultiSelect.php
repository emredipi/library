<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Component;

class MultiSelect extends Component
{
    public string $searchText = '';
    public Collection $items;
    public array $selectedIds = [];
    public string $name;
    public string $model;
    public string $label;

    public function fetch()
    {
        $this->items = $this->model::query()
            ->where('name', 'like', "$this->searchText%")
            ->whereNotIn('id', $this->selectedIds)
            ->limit(10)
            ->get();
        return Category::query()->whereIn('id', $this->selectedIds)->get();
    }

    public function choose($id)
    {
        $this->selectedIds[] = $id;
    }

    public function remove($id)
    {
        $this->selectedIds = array_filter($this->selectedIds, function ($el) use ($id) {
            return $el !== $id;
        });
    }

    public function render()
    {
        return view('livewire.multi-select', [
            'selectedItems' => $this->fetch()
        ]);
    }
}

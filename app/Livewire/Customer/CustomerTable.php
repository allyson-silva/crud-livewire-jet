<?php

namespace App\Livewire\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination;
    use WithSorting;

    public CustomerForm $form;

    public
        $paginate = 5,
        $sortBy = 'customers.id',
        $sortDirection = 'desc';

    public function confirmDelete($get_id)
    {
        try {

            Customer::destroy($get_id);

        } catch (\Exception $e) {

            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan');

        }
    }

    #[On('dispatch-customer-create-save')]
    #[On('dispatch-customer-create-edit')]
    #[On('dispatch-customer-delete-del')]
    public function render()
    {
        return view('livewire.customer.customer-table', [
            'data' => Customer::where('id', 'like', '%'.$this->form->id.'%')
                ->where('name', 'like', '%'.$this->form->name.'%')
                ->where('email', 'like', '%'.$this->form->email.'%')
                ->where('address', 'like', '%'.$this->form->address.'%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }
}

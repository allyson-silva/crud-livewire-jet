<div>
    <x-select wire:model.live="paginate" class="text-xs mt-8">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>

    <table class="w-full mt-2">
        <thead>
            <tr>
                <th class="p-2 whitespace-nowrap border border-spacing-1">#</th>
                <th class="p-2 whitespace-nowrap border border-spacing-1">Action</th>
                <th @click="$wire.sortField('id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'id'" /> ID
                </th>
                <th @click="$wire.sortField('name')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'name'" /> Name
                </th>
                <th @click="$wire.sortField('email')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'email'" /> Email
                </th>
                <th @click="$wire.sortField('address')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'address'" /> Address
                </th>

            </tr>
            <tr>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.id" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.name" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.email" type="search" class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.address" type="search" class="w-full text-sm" /></td>

            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach($data as $customer)
                    <tr>
                        <td class="p-2 border border-spacing-1 text-center">{{ $loop->iteration }}.</td>
                        <td class="p-2 border border-spacing-1">
                            <x-button @click="$dispatch('dispatch-customer-table-edit', { id: '{{ $customer->id }}' })" type="button">Edit</x-button>
                            <x-danger-button
                                @click="$dispatch('confirm-delete', { get_id: {{ $customer->id }} })"
                            >Delete</x-danger-button>
                        </td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $customer->id }}</td>
                        <td class="p-2 border border-spacing-1">{{ $customer->name }}</td>
                        <td class="p-2 border border-spacing-1">{{ $customer->email }}</td>
                        <td class="p-2 border border-spacing-1">{{ $customer->address }}</td>

                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>

    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>

    <x-confirm-delete />
</div>

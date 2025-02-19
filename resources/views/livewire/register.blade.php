<div class="flex justify-center">
    <x-form wire:submit="register" class="w-96">

        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-input label="Password" type="password" wire:model="password" />

        <x-slot:actions>
            <x-button label="Register" class="btn-primary" type="submit" spinner="register" />
        </x-slot:actions>
    </x-form>
</div>

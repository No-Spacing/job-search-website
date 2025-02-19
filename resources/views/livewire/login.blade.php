<div class="flex justify-center">
    <x-form wire:submit="login" class="w-96">

        @if(Session::has('errorMsg'))
            <x-alert title="Login" description="{{ Session::get('errorMsg') }}" icon="o-exclamation-triangle" class="alert-warning" />
        @endif

        <x-input label="Email" wire:model="email" />
        <x-input type="password" label="Password" wire:model="password" />
        
        <a class="text-[15px] justify-self-end text-blue-500" href="/register" >Register</a>

        <x-slot:actions>
            <x-button label="Login" class="btn-primary" type="submit" spinner="login" />
        </x-slot:actions>
    </x-form>
</div>

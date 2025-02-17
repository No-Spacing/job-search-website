<div class="pt-12">

    <x-header title="Jobs" separator progress-indicator>
    
    <x-slot:middle>
        <x-input placeholder="Job Title..." wire:model.live="search" clearable icon="o-magnifying-glass" />
    </x-slot:middle>
    
    <x-slot:actions>
        <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
    </x-slot:actions> 
    </x-header>


    <div class="grid grid-cols-3 gap-3">
        
    @foreach($jobs as $key=>$job)

        <x-card class="flex-shrink" title="{{ $job['title'] }}" subtitle="{{ $job['company_name'] }}" shadow separator>
            {{ $job['message'] }}.
    
            <x-slot:menu class="">
                <x-button icon="s-share" class="btn-circle btn-ghost text-blue-500" />
                <x-button icon="s-heart" class="btn-circle btn-ghost text-red-400" />
            </x-slot:menu>
            
            <x-slot:actions>
                <x-button label="Open" class="btn-outline" wire:click="openModal({{ $job['id'] }})" spinner="openModal"/>
            </x-slot:actions>
        </x-card>  
        
    @endforeach

        <x-modal wire:model="descriptionModal" class="backdrop-blur">
        
            <x-card title="{{ $singleJob['title'] ?? '' }}" subtitle="{{ $singleJob['company_name'] ?? '' }}">
                <x-slot:subtitle>
                    Pay: {{ $singleJob['pay'] ?? '' }}
                </x-slot:subtitle>

                <x-slot:figure>
                    <img src="/image/job-search-cover.jpeg" />
                </x-slot:figure>

                {{ $singleJob['description'] ?? '' }}
                <br>
                
                <x-slot:actions>
                    <x-button label="Close" @click="$wire.descriptionModal = false" />
                    <x-button label="Apply" class="btn-success" wire:click="applyJob" spinner="applyJob"/>
                </x-slot:actions>
            </x-card>
        </x-modal>
    </div>


    <!-- FILTER DRAWER -->
    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
    <x-form>

        <div class="grid grid-flow-row grid-cols-3 gap-1">
            <x-checkbox label="IT Specialist" wire:model="filter" value="IT Specialist" checked/>
            <x-checkbox label="Network Administrator" wire:model="filter" value="Network Administrator" />
            <x-checkbox label="Network Security Engineer" wire:model="filter" value="Network Security Engineer" />

        </div>

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" wire:click="applyFilters" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-form>
    </x-drawer>

</div>
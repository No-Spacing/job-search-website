<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Home extends Component
{

    use Toast;

    public bool $descriptionModal;

    public string $search = "";

    public bool $drawer = false;

    public $singleJob = [];

    public $filter = [];

    public int $user = 0;

    public function openModal($id): void
    {
        $this->descriptionModal = true;
        $this->singleJob = $this->jobs()->firstWhere('id', $id);
    }

    public function applyJob()
    {
        if(session()->has('user')) {
            $this->success('Job application sent to '. $this->singleJob['email'], position: 'toast-bottom');
        } else { 
            return redirect()->route('login')->with('errorMsg', 'User must be login');    
        }
            
    }


    public function applyFilters(): void
    {
        $this->success('Filters applied.',  position: 'toast-bottom');
    }

    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function jobs(): Collection
    {
        return collect([
            [
                'id' => 1, 
                'title' => 'IT Specialist', 
                'email' => 'apply@votehub.com', 
                'company_name'=> 'Votehub',
                'pay' => 'PHP25,000',
                'message' => 'Welcome To Votehub', 
                'description' => 'An IT specialist is responsible for the maintenance, configuration, and reliable operation of computer systems and servers. They make sure that the technical infrastructure of an organisation runs smoothly and efficiently. They support business operations by helping other employees troubleshoot technical problems.'
            ],
            [
                'id' => 2, 
                'title' => 'Network Administrator', 
                'email' => 'apply@gvnetworks.com', 
                'company_name'=> 'GV Networks',
                'pay' => 'PHP35,000',
                'message' => 'Welcome to GV Networks', 
                'description' => 'Network administrators are IT professionals who ensure that networks are operating to meet the needs of an organization. They are the first line of support for most things networking. They install, maintain, monitor, and troubleshoot networks and keep them secure.'],
            [
                'id' => 3, 
                'title' => 'Network Security Engineer', 
                'email' => 'apply@vsolutions.com', 
                'company_name'=> 'V Solutions',
                'pay' => 'PHP50,000',
                'message' => 'Welcome to V Solutions', 
                'description' => 'A network security engineer is responsible for every aspect of data safety in a network, ensuring there are minimum vulnerabilities by adopting and integrating the latest technology to prevent malicious attacks.'],
        ])
        ->when($this->search, function (Collection $collection) {
            return $collection->filter(fn(array $item) => str($item['title'])->contains($this->search, true));
        })->when($this->filter, function (Collection $collection) {
            return $collection->filter(fn(array $item) => str($item['title'])->contains($this->filter[0], true));
        });
    }

    #[Title('Home')] 
    public function render()
    {
        return view('livewire.home',[
            'jobs' => $this->jobs(),
        ]);
    }
}

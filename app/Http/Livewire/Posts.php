<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    public $prompt;
    public $action;
    public $selectedItem;


    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function selectItem($itemId = null, $action = null)
    {

        $this->selectedItem = $itemId;
        $this->action = $action;

           if($this->action == 'update'){
                $this->emit('getModelId', $this->selectedItem);
                $this->dispatchBrowserEvent('updatedPost');
            }elseif($this->action == 'showPhotos'){
               $this->emit('getPostId', $this->selectedItem);
               $this->dispatchBrowserEvent('openModalShowPhotos');
           } else{
               $this->dispatchBrowserEvent('updatedPost');
           }

    }

    public function delInputData()
    {
        $this->emit('delInput');
    }

    public function delete($id)
    {
        Post::destroy($id);
    }

    public function render()
    {
        if (auth()->user()) {
            return view('livewire.posts', [
                'posts' => Post::where('user_id', auth()->user()->id)->paginate(3)
            ]);
        }
        return view('livewire.posts');
    }


}

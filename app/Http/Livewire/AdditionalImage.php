<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdditionalPhotos;

class AdditionalImage extends Component
{
    public $postId;

    protected $listeners = [
        'getPostId',
    ];

    public function getPostId($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        return view('livewire.additional-image', [
            'additionalPhotos' => AdditionalPhotos::where('post_id', '=', $this->postId)->get()
        ]);
    }
}

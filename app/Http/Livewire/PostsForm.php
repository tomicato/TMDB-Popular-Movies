<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as ImageInt;
use App\Models\AdditionalPhotos;

class PostsForm extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $modelId;
    public $uploadedImage;
    public $additionalPhotos;

    protected $listeners = [
        'getModelId',
        'forcedCloseModal',
        'delInput'
    ];


    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = Post::find($this->modelId);

        $this->title = $model->title;
        $this->content = $model->content;
    }

    public function delInput()
    {
        $this->clearData();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'title' => 'required|min:10|max:30',
            'content' => 'required',
            'uploadedImage' => 'required|image|max:2048',
            'additionalPhotos.*' => 'required|image|max:1024',
        ]);
    }



    public function save()
    {
        if (!auth()->user()) return;

        $validateData = [
            'title' => 'required|min:10|max:30',
            'content' => 'required',
        ];

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,

        ];

        if (!empty($this->uploadedImage)) {
            $imageHashName = $this->uploadedImage->getClientOriginalName();

            $validateData = array_merge($validateData, [
                'uploadedImage' => 'required|image|max:5048'
            ]);

            $data = array_merge($data, [
                'uploaded_photo' => $imageHashName
            ]);

            $img = ImageInt::make($this->uploadedImage);
            $img->save('storage/photos/' . $imageHashName);
            $manager = new ImageManager();
            $image = $manager->make('storage/photos/' . $imageHashName)->resize(300, 200);
            $image->save('storage/photos_thumb/' . $imageHashName);

        }

        if(!empty($this->additionalPhotos)){
            $validateData = array_merge($validateData, [
               'additionalPhotos.*' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120'
            ]);
        }
        $this->validate($validateData);


        if ($this->modelId) {
            Post::find($this->modelId)->update($data);
            $postInstanceId = $this->modelId;

        } else {
            $postInstance = Post::create($data);
            $postInstanceId = $postInstance->id;

        }

        if(!empty($this->additionalPhotos)){
           // dd(public_path());
            foreach ($this->additionalPhotos as $photo){
                //$photo->store('public/additional_photos');

                $img = ImageInt::make($photo);
                $img->save(public_path().'/storage/additional_photos/'.$photo->getClientOriginalName());

                AdditionalPhotos::create([
                    'post_id' => $postInstanceId,
                    'filename' => $photo->getClientOriginalName()
                ]);
            }
        }



        $this->emit('refreshParent');
        $this->clearData();

    }

    private function clearData()
    {
        $this->title = null;
        $this->content = null;
        $this->modelId = null;
        $this->uploadedImage = null;
        $this->additionalPhotos = null;
    }

    public function render()
    {
        return view('livewire.posts-form');
    }
}

<div>
    @if(count($additionalPhotos))
        <div class="grid grid-cols-3 gap-4">
            @foreach($additionalPhotos as $photo)
                <img src="{{ url('storage/additional_photos/'.$photo->filename) }}" alt="" width="200px"/>
            @endforeach
        </div>
    @else
        <p>No additional photos!</p>
    @endif
</div>

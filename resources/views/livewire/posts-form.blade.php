<div class="my-4">
    <!--Title-->

    <div class="flex flex-row justify-between items-center pb-3">
        <p class="text-2xl font-bold"> {{ $modelId != null ? 'Изменить пост № ' . $modelId : 'Добавить пост' }}</p>
        <div wire:click="delInputData()" class="modal-close-upd cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                 viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </div>
    </div>
    <hr class="my-4">

    <label class="block text-gray-700 text-base font-bold my-5" for="title">
        Изображение
    </label>

    <div x-data="{ isUploading: false, progress: 0 }"
         x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false"
         x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress">
        <!-- File Input -->
        <input type="file" wire:model="uploadedImage">
        @error('uploadedImage') <span class="error">{{ $message }}</span> @enderror
    <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress" class="bg-pink-800"></progress>
        </div>
    </div>
    <br>


    <label class="block text-gray-700 text-base font-bold my-5" for="additional_photos"> Доп.изображения</label>
    <input type="file" wire:model="additionalPhotos" multiple id="additional_photos"><br/>
    <div wire:loading wire:target="additionalPhotos" class="text-sm">Идёт загрузка файлов..., подождите.</div>

    <label class="block text-gray-700 text-base font-bold my-5">Заголовок</label>
    <input wire:model="title"
           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           type="text" placeholder="Title"/>
    @error('title') <span class="text-red-400 text-sm">{{ $message }}</span><br> @enderror


    <label for="content" class="block text-gray-700 text-base font-bold my-5">Описание</label>
    <textarea wire:model="content" id="content"
              class="shadow appearance-none py-2 px-3 w-full h-32 resize-y border rounded focus:outline-none focus:shadow-outline"
              placeholder="Description"></textarea>
    @error('content') <span class="text-red-400 text-sm">{{ $message }}</span><br> @enderror
    <div wire:loading.remove>
        <button wire:loading.attr="enabled" wire:click="save"
                class="my-5 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent focus:outline-none rounded">

            {{ $modelId != null ? 'Изменить ' : 'Доавить' }}

        </button>
    </div>

    <!--wire:loading.attr="disabled" wire:click="save"-->
</div>

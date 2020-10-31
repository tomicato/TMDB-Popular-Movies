<div>
    <!--  Modal Style -->
    <style>
        .modal-upd, .opacity-0 {
            transition: opacity 0.35s ease-in-out;
        }

        #modal-window-update.modal-active-upd,  #modal-show-photose.modal-active-show {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>{{--wire:click="selectItem()"--}}

    @if(!auth()->guest())
        <button onclick="toggleModal()"
                class="modal-open-upd focus:outline-none bg-transparent border border-blue-500 hover:border-blue-500 text-blue-500 hover:text-white hover:bg-blue-500 font-bold  mt-0 mb-10 py-2 px-4 rounded-full">
            Добавить пост
        </button><br/><br/>
        <hr class="mb-16"/>
@endif


<!-- Modal window -->
    <div id="modal-window-update"
         class="modal-upd opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div wire:click="delInputData()" class="modal-overlay-upd absolute w-full h-full bg-gray-900 opacity-75"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">

                <!--Body-->
                <p>@livewire('posts-form')</p><hr class="my-4">
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button wire:click="delInputData()"
                            class="modal-close-upd px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent focus:outline-none rounded">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal window -->

    <!-- Modal window Additional -->
    <div id="modal-show-photos"
         class="modal-show opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div wire:click="delInputData()" class="modal-overlay-show absolute w-full h-full bg-gray-900 opacity-75"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex flex-row justify-between items-center pb-3">
                    <p class="text-left"> Photos</p>
                    <div wire:click="delInputData()" class="modal-close-show cursor-pointer z-50">

                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div><hr class="my-4">
                <!--Body-->
                <p>@livewire('additional-image')</p><hr class="my-4">
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button wire:click="delInputData()"
                            class="modal-close-show px-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent focus:outline-none rounded">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal window Additional -->

    <!--  Table Posts -->

        @if(isset($posts))
<div class="block overflow-x-auto w-full md:overflow-x-hidden">
            <table class="table-auto my-5 table-responsive">
                <thead>
                <tr class="text-center">
                    <th class="px-4 py-2">Photo</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $key => $post)
                    @if($key % 2 == 0)
                        <tr>
                            <td class="text-center border w-2/12  px-4 py-2">
                                @if(!empty($post->uploaded_photo))
                                    <img class="m-auto" src="{{ url('storage/photos_thumb/'.$post->uploaded_photo) }}"
                                         alt="" width="100px"/>
                                @else
                                    <svg class="m-auto h-16 w-16 md:h-20 md:w-20 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="1" y1="1" x2="23" y2="23" />  <path d="M21 21H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3m3-3h6l2 3h4a2 2 0 0 1 2 2v9.34m-7.72-2.06a4 4 0 1 1-5.56-5.56" /></svg>
                                @endif
                            </td>
                            <td class="text-justify border w-1/6  px-4 py-2">{{ $post->title }}</td>

                            <td class="text-justify border w-3/6  px-4 py-2">{{ $post->content }}</td>
                            <td class="w-2/12 border px-0 py-2">
                                <div class="flex flex-col md:flex-row items-center md:justify-around">
                                    <svg wire:click="selectItem({{ $post->id }}, 'update')"
                                         class="my-10 modal-open-upd cursor-pointer h-6 w-6 text-blue-600">
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                                        </svg>
                                    </svg>
                                    <svg wire:click="selectItem({{ $post->id }}, 'showPhotos')"
                                         class="my-10 modal-open-show cursor-pointer  h-6 w-6 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <line x1="15" y1="8" x2="15.01" y2="8"/>
                                        <rect x="4" y="4" width="16" height="16" rx="3"/>
                                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l 5 5"/>
                                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l 2 2"/>
                                    </svg>
                                    <svg onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                         wire:click="delete({{ $post->id }})"
                                         class="my-10 cursor-pointer h-6 w-6 text-red-600"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"/>
                                        <line x1="6" y1="6" x2="18" y2="18"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                    @else
                        <tr class="bg-gray-100">
                            <td class="text-center border w-2/12 px-4 py-2">
                                @if(!empty($post->uploaded_photo))
                                    <img class="m-auto" src="{{ url('storage/photos_thumb/'.$post->uploaded_photo) }}"
                                         alt="" width="100px"/>
                                @else
                                    <svg class="m-auto h-20 w-20 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="1" y1="1" x2="23" y2="23" />  <path d="M21 21H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3m3-3h6l2 3h4a2 2 0 0 1 2 2v9.34m-7.72-2.06a4 4 0 1 1-5.56-5.56" /></svg>
                                @endif
                            </td>
                            <td class="text-justify border  w-1/6 px-4 py-2">{{ $post->title }}</td>
                            <td class="text-justify border  w-3/6 px-4 py-2">{{ $post->content }}</td>
                            <td class="w-2/12 border px-0 py-2">
                                <div class="flex flex-col md:flex-row items-center md:justify-around">
                                    <svg wire:click="selectItem({{ $post->id }}, 'update')"
                                         class="my-10 modal-open-upd cursor-pointer h-6 w-6 text-blue-600">
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                                        </svg>
                                    </svg>
                                    <svg wire:click="selectItem({{ $post->id }}, 'showPhotos')"
                                         class="my-10 modal-open-show cursor-pointer  h-6 w-6 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <line x1="15" y1="8" x2="15.01" y2="8"/>
                                        <rect x="4" y="4" width="16" height="16" rx="3"/>
                                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l 5 5"/>
                                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l 2 2"/>
                                    </svg>
                                    <svg onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                         wire:click="delete({{ $post->id }})"
                                         class="my-10 cursor-pointer h-6 w-6 text-red-600"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"/>
                                        <line x1="6" y1="6" x2="18" y2="18"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
</div>
            <div class="m-auto block my-10"> {{ $posts->links() }}</div>
        @endif


    <!-- Script -->
    <script>

        const upd = document.getElementById('modal-window-update');
        const show_photos = document.getElementById('modal-show-photos');

        const modal_upd = document.querySelector('.modal-upd');
        const show = document.querySelector('.modal-show');

        let open_upd = document.querySelectorAll('.modal-open-upd');
        let open_show = document.querySelectorAll('.modal-open-show');

        let pagination = document.querySelector('nav[role="navigation"]');

        for (let i = 0; i < open_upd.length; i++) {
            open_upd[i].addEventListener('updatedPost', function (event) {
                event.preventDefault();
                toggleModal();
            })
        }

        for (let i = 0; i < open_show.length; i++) {
            open_show[i].addEventListener('openModalShowPhotos', function (event) {
                event.preventDefault();
                toggleModalShow();
            })
        }


        const overlay_upd = document.querySelector('.modal-overlay-upd');
        const overlay_show = document.querySelector('.modal-overlay-show');

        overlay_upd.addEventListener('click', toggleModal);
        overlay_show.addEventListener('click', toggleModalShow);

        let close_upd = document.querySelectorAll('.modal-close-upd');
        let close_show = document.querySelectorAll('.modal-close-show');
        for (let i = 0; i < close_upd.length; i++) {
            close_upd[i].addEventListener('click', toggleModal);
        }
        for (let i = 0; i < close_show.length; i++) {
            close_show[i].addEventListener('click', toggleModalShow);
        }

        document.onkeydown = function (evt) {
            evt = evt || window.event;
            let isEscape = false;
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc");
            } else {
                isEscape = (evt.keyCode === 27);
            }

            if (isEscape && document.body.classList.contains('modal-active-upd')) {
                toggleModal();
            }

            if (isEscape && document.body.classList.contains('modal-active-show')) {
                toggleModalShow();
            }
        };


        function toggleModal() {

            modal_upd.classList.toggle('opacity-0');
            modal_upd.classList.toggle('pointer-events-none');
            upd.classList.toggle('modal-active-upd');
            pagination.classList.toggle('opacity-0');
        }

        function toggleModalShow() {

            show.classList.toggle('opacity-0');
            show.classList.toggle('pointer-events-none');
            show_photos.classList.toggle('modal-active-upd');
            pagination.classList.toggle('opacity-0');
        }

    </script>
</div>

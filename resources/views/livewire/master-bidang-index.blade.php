
    <div>
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <article  class="w-full px-6 md:px-8 py-8 md:py-12 rounded-lg bg-white dark:bg-gray-800 dark:text-white shadow-lg">
                <div>


                            <div id="app">
                                @if(Session::has('message'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                    <span class="font-medium">{{ session('message') }}</span>
                                  </div>
                            @endif

                            @if(Session::has('message_danger'))
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                <div class="flex">
                                  <div>
                                    <p class="text-sm">{{ session('message_danger') }}</p>
                                  </div>
                                </div>
                              </div>
                            @endif
                            <button wire:click="create()" class="btn btn-info btn-sm">Tambah</button>
                                <div class="form-container">

                                    @if($isOpen)
                                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                          <div class="fixed inset-0 transition-opacity">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                          </div>

                                          <!-- This element is to trick the browser into centering the modal contents. -->
                                          <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                                          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <form>
                                            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                              <div class="">
                                                    <div class="mb-4">
                                                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2 dark:text-white">{{ucwords('nama')}}:</label>
                                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Masukkan {{ucwords('nama')}}" wire:model="nama">
                                                        @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                                                    </div>



                                              </div>
                                            </div>
                                        </form>

                                            <div class="dark:bg-gray-800 bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                              <span class="flex w-full rounded-md shadow-sm sm:mr-3 sm:w-auto">
                                                <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-blue dark:text-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                  Simpan
                                                </button>
                                              </span>
                                              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                                                <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                  Tutup
                                                </button>
                                              </span>
                                            </div>

                                          </div>
                                        </div>
                                    @endif

                                </div>
                                <p><br></p>
                                <div class="overflow-x-auto">
                                    @livewire('master-bidang-table')

                                </div>

                            </div>


                </div>

        </article>
    </div>

    @push('scripts')

    @endpush



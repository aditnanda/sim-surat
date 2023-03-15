<style>
    .blink {
  animation: blink 1s steps(1, end) infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>
<footer class="items-center p-4 footer bg-white dark:bg-gray-800 shadow dark:text-white text-base-content">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="{{url('/')}}" class="flex items-center mb-4 sm:mb-0">
            <img src="{{asset('logo.png')}}" alt="" srcset="" class="h-8 mr-3">

            {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{env("APP_NAME")}}</span>
        </a>
    </div>
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">Dinas Kesehatan dan KB Kabupaten Sampang
        </span>
        <br>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">Copyright © {{date('Y')}} <a href="{{url('/')}}" class="hover:underline">{{env('APP_NAME')}}</a>. All Rights Reserved.
        </span>
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">Powered by {!! (date('m-d') == '03-24') ? '<a href="'.url('/am').'" class="blink">AM</a>' : 'AM'!!} & <a href="https://aditnanda.com" target="__blank">NAND</a>
        </span>
    </div>

</footer>

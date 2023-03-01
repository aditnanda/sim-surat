@props(['surat_masuk','surat_keluar'])

<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Selamat datang, {{auth()->user()->name}}!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        SIM (Sistem Informasi Manajemen) Surat Keluar dan Masuk adalah sebuah sistem yang digunakan untuk mengelola surat yang masuk dan keluar pada suatu organisasi.
<br><br>
Dengan adanya SIM Surat Keluar dan Masuk, organisasi dapat memantau dengan mudah setiap surat yang masuk dan keluar. SIM Surat Keluar dan Masuk juga memudahkan dalam pengelolaan arsip surat, sehingga meminimalkan risiko kehilangan atau kebingungan dalam mencari arsip surat yang dibutuhkan.
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{url('/surat-masuk')}}">{{$surat_masuk}} Surat Masuk</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Surat Masuk digunakan untuk mencatat dan mengelola surat-surat yang masuk ke dalam suatu organisasi. Setiap surat masuk akan diberikan nomor urut dan kemudian akan dilakukan proses distribusi ke bagian atau departemen yang terkait untuk ditindaklanjuti
        </p>


    </div>

    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{url('/surat-keluar')}}">{{$surat_keluar}} Surat Keluar</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Surat Keluar digunakan untuk mencatat dan mengelola surat-surat yang keluar dari suatu organisasi. Setiap surat keluar akan diberikan nomor urut dan kemudian akan dicatat dalam sistem serta disimpan dalam arsip.

        </p>

    </div>


</div>

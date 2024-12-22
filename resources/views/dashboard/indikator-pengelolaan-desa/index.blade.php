@extends('dashboard/layouts/main')

@section('container_content')
<div>
    <div class="flex justify-between flex-wrap items-center mb-6">
        <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 ltr:pr-4 rtl:pl-4 mb-4 sm:mb-0 flex space-x-3 rtl:space-x-reverse">
            Indikator Pengelolaan Desa</h4>
    </div>
    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
            <div class="bg-no-repeat bg-cover bg-center p-4 rounded-[6px] relative"
                style="background-image: url(/images/all-img/widget-bg-1.png)">
                <div class="max-w-[180px]">
                    <div class="text-xl font-medium text-slate-900 mb-2">
                        Upgrade your Dashcode
                    </div>
                    <p class="text-sm text-slate-800">
                        Pro plan for better results
                    </p>
                </div>
                <div class="absolute top-1/2 -translate-y-1/2 ltr:right-6 rtl:left-6 mt-2 h-12 w-12 bg-white rounded-full text-xs font-medium flex flex-col items-center justify-center">
                    Now
                </div>
            </div>
        </div>
        <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
            <div class="p-4 card">
                <div class="grid md:grid-cols-3 col-span-1 gap-4">
                    <!-- BEGIN: Group Chart2 -->
                    <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 ">
                        <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div id="wline1"></div>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel revenue
                                </div>
                                <div
                                    class="text-slate-900 dark:text-white text-lg font-medium">
                                    3,564
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 ">
                        <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div id="wline2"></div>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Products sold
                                </div>
                                <div
                                    class="text-slate-900 dark:text-white text-lg font-medium">
                                    564
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 ">
                        <div class="flex items-center space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div id="wline3"></div>
                            </div>
                            <div class="flex-1">
                                <div
                                    class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Growth
                                </div>
                                <div
                                    class="text-slate-900 dark:text-white text-lg font-medium">
                                    +5.0%
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END: Group Chart2 -->
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5">
        <div class="lg:col-span-8 col-span-12">
            <div class="card">
                <div class="card-body p-6">
                    <div class="legend-ring">
                        <div id="revenue-barchart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-4 col-span-12">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title">Overview</h4>
                    <div>
                        <!-- BEGIN: Card Dropdown -->
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full "
                                    type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700 rounded dark:text-slate-400">
                                        <iconify-icon
                                            icon="heroicons-outline:dots-horizontal">
                                        </iconify-icon>
                                    </span>
                                </button>
                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Card Droopdown -->
                    </div>
                </header>
                <div class="card-body p-6">
                    <div id="radial-bar"></div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-10 col-span-12">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Daftar Indikator</h4>
                    <div>
                        <!-- BEGIN: Card Dropdown -->
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full "
                                    type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700 rounded dark:text-slate-400">
                                        <iconify-icon
                                            icon="heroicons-outline:dots-horizontal">
                                        </iconify-icon>
                                    </span>
                                </button>
                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Card Droopdown -->
                    </div>
                </header>
                <div class="card-body p-6"> 
                    <!-- BEGIN: Company Table --> 
                    <a href="/dashboard/form-indikator-desa/create">
                        <button class="btn inline-flex justify-center btn-outline-primary rounded-[25px]">
                            <span class="flex items-center">
                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:newspaper"></iconify-icon>
                                <span>Tambah Data</span>
                            </span>
                        </button>
                    </a>
                    @if(session()->has('success'))
                    <div class="py-[18px] mt-5 px-6 font-normal text-sm rounded-md bg-success-500 text-white">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
                            <iconify-icon class="text-2xl flex-0" icon="system-uicons:target"></iconify-icon>
                            <p class="flex-1 font-Inter">
                                {!! session('success') !!}
                            </p>
                            <div class="flex-0 text-xl cursor-pointer">
                                <iconify-icon icon="line-md:close"></iconify-icon>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                @include('components.tab.tab', ['indicators' => $indicators, 'columns' => $columns])
                                
                            </div>
                        </div>
                    </div>
                    <!-- END: Company Table -->
                </div>
            </div>
        </div> 
        <div class="lg:col-span-8 col-span-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Most Sales</h4>
                    <div>
                        <!-- BEGIN: Card Dropdown -->
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full "
                                    type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700 rounded dark:text-slate-400">
                                        <iconify-icon
                                            icon="heroicons-outline:dots-horizontal">
                                        </iconify-icon>
                                    </span>
                                </button>
                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Card Droopdown -->
                    </div>
                </div>
                <div class="card-body p-6">

                    <!-- BEGIN: Most Sale -->



                    <div class="md:flex items-center">
                        <div class="grow-0">
                            <h4
                                class="text-slate-600 dark:text-slate-200 text-sm font-normal mb-[6px]">
                                Total earnings
                            </h4>

                            <div
                                class="text-lg font-medium mb-[6px] dark:text-white text-slate-900">
                                $12,65,64787.00
                            </div>


                            <div class="text-xs font-light dark:text-slate-200">
                                <span class="text-primary-500">+08%</span> From last
                                month
                            </div>
                            <ul
                                class="bg-slate-50 dark:bg-slate-900 rounded p-4 min-w-[184px] space-y-5 mt-4">



                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-primary-500 ring-primary-500 "></span>
                                        <span>Nevada</span>
                                    </span>
                                    <span>$125k</span>
                                </li>


                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-success-500 ring-success-500 "></span>
                                        <span>Colorado</span>
                                    </span>
                                    <span>$$325k</span>
                                </li>


                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-info-500 ring-info-500 "></span>
                                        <span>Iowa</span>
                                    </span>
                                    <span>$67</span>
                                </li>


                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-warning-500 ring-warning-500 "></span>
                                        <span>Arkansas</span>
                                    </span>
                                    <span>$354k</span>
                                </li>


                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-success-500 ring-success-500 "></span>
                                        <span>Wyoming</span>
                                    </span>
                                    <span>$195k</span>
                                </li>


                                <li
                                    class="flex justify-between text-xs text-slate-600 dark:text-slate-300">
                                    <span
                                        class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <span class="inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4 bg-secondary-500 ring-secondary-500 "></span>
                                        <span>Other countries</span>
                                    </span>
                                    <span>$295k</span>
                                </li>

                            </ul>
                        </div>
                        <div class=" grow">
                            <div
                                class="h-[360px] w-full bg-white dark:bg-slate-800 ltr:pl-10 rtl:pr-10">
                                <div id="world-map" class="h-full w-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Most Sale -->
                </div>
            </div>
        </div>
        <div class="lg:col-span-4 col-span-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Overview</h4>
                    <div>
                        <!-- BEGIN: Card Dropdown -->
                        <div class="relative">
                            <div class="dropdown relative">
                                <button class="text-xl text-center block w-full "
                                    type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700 rounded dark:text-slate-400">
                                        <iconify-icon
                                            icon="heroicons-outline:dots-horizontal">
                                        </iconify-icon>
                                    </span>
                                </button>
                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            Last Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Card Droopdown -->
                    </div>
                </div>
                <div class="card-body p-6">
                    <div id="radar-home-chart"></div>
                    <div
                        class="bg-slate-50 dark:bg-slate-900 rounded p-4 mt-8 flex justify-between flex-wrap">
                        <div class="space-y-1">
                            <h4
                                class="text-slate-600 dark:text-slate-200 text-xs font-normal">
                                Invested amount
                            </h4>
                            <div
                                class="text-sm font-medium text-slate-900 dark:text-white">
                                $8264.35
                            </div>
                            <div
                                class="text-slate-500 dark:text-slate-300 text-xs font-normal">
                                +0.001.23 (0.2%)
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h4
                                class="text-slate-600 dark:text-slate-200 text-xs font-normal">
                                Invested amount
                            </h4>
                            <div
                                class="text-sm font-medium text-slate-900 dark:text-white">
                                $8264.35
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h4
                                class="text-slate-600 dark:text-slate-200 text-xs font-normal">
                                Invested amount
                            </h4>
                            <div
                                class="text-sm font-medium text-slate-900 dark:text-white">
                                $8264.35
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

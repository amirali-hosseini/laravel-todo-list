<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') . ' | ' }} @yield('page')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-primary-gray font-estedad grid grid-cols-6" x-data="{ modal: false }">

    <div x-show="modal" x-cloak class="absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
        <div class="relative top-50 p-4 w-full max-w-md mx-auto max-h-full">

            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                <div
                    class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-estedad-bold text-gray-900 dark:text-white">
                        ایجاد تسک جدید
                    </h3>
                    <button @click="modal = !modal"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">بستن</span>
                    </button>
                </div>

                <div class="p-4">
                    <form class="space-y-4" action="{{ route('tasks.store') }}" method="POST">

                        @csrf

                        <div>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="عنوان" required />
                        </div>
                        <div>
                            <input type="date" name="deadline" id="deadline"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="تاریخ انتها" required />
                        </div>
                        <div>
                            <select name="project_id" id="project_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                                <option value="">پروژه</option>
                                @foreach (auth()->user()->projects()->latest()->get() as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <textarea rows="5" cols="30" name="description" id="description" placeholder="توضیحات"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            ایجاد تسک
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed z-10 xl:sticky w-72 xl:w-full shadow sm:shadow-none xl:col-span-1 h-screen top-0 hidden xl:block"
        id="sidebar">
        @include('layouts.sidebar')
    </div>

    <div class="col-span-6 xl:col-span-5">
        <!-- Desktop Header -->
        @include('layouts.desktop-header')

        <!-- Mobile Header -->
        @include('layouts.mobile-header')

        @yield('content')

    </div>

    @vite('resources/js/app.js')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        <style type="text/tailwindcss">
            .btn {
                @apply mb-5 rounded-md px-2 py-2 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
            }

            label {
                @apply block uppercase text-slate-700 mb-2
            }

            textarea, input {
                @apply shadow-sm appearance-none border w-full py-3 px-3 text-slate-700 leading-tight focus:outline-none
            }

        </style>
        @yield("styles")
    </head>
    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-10 text-2xl">@yield("title")</h1>
        @if (session()->has('success'))
            <div x-data="{ flash : true }" >
                <div x-show="flash">
                    <div class=" relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700 " role="alert">
                        <strong class="font-bold">Success ! </strong>
                        <div>{{session('success')}}</div>
                        <span class=" absolute px-4 py-3 top-0 bottom-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="1.5" class=" cursor-pointer h-6 w-6 " @click="flash = false">
                            <path d="M18 6 L6 18 M6 6 L18 18" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </span>
                    </div>
                </div>
            </div>
        @endif
        <div>
            @yield("content")
        </div>
    </body>
</html>
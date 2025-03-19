<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-end my-6 mx-3 ">
                    <a href="{{route('notes.create') }}"
                        class="px-4 py-3  text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __("Create Note") }}</a>

                </div>
                <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-4 py-5 px-4 relative min-h-[300px]">

                    @forelse ( $notes as $note )
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">







                        <div class="flex justify-end mb-3  ">

                            @can("update",$note)
                            <a href="{{route('notes.edit',$note->id)}}"
                                class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            @endcan


                            @can("delete",$note)
                            <form action="{{route('notes.destroy', $note->id)}}" onsubmit="deleteNote(this)"
                                method="post">
                                @method("delete")
                                @csrf
                                <button type="submit"
                                    class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500"
                                    data-bs-toggle="button" aria-pressed="false" autocomplete="off">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </div>

                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $note->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ str($note->content)->limit(100) }}
                        </p>
                        <a href="{{ route("notes.show",$note) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>

                    @empty

                    <div
                        class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] text-2xl dark:text-white text-black">
                        Not notes exist
                    </div>

                    @endforelse

                </div>

                <div class="d-block px-4 my-5">

                    {{ $notes->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        async function deleteNote(form) {
        event.preventDefault(); 
        
        const willDelete = await swal({
            title: "Are you sure?",
  text: "Are you sure that you want to delete this file?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
        });

        if (willDelete) {
            form.submit();
        }
    }
    </script>
</x-app-layout>
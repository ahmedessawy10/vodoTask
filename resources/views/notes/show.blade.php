<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end mb-3  mt-6 mx-6">

                    @can("update",$note)
                    <a href="{{route('notes.edit',$note->id)}}"
                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    @endcan


                    @can("delete",$note)
                    <form action="{{route('notes.destroy', $note->id)}}" onsubmit="deleteNote(this)" method="post">
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
                <h1
                    class="mb-8 text-3xl mt-4 text-center font-extrabold leading-tight text-gray-900 lg:mb-8 lg:text-4xl dark:text-white">
                    {{$note->title}}</h1>
                <p
                    class="mb-4 mt-[100px] text-lg text-start px-3 font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-xl dark:text-white">
                    {{$note->content}}</p>
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
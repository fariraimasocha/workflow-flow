<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.steps.index') }}" 
                class="px-4 py-2 bg-fuchsia-500 hover:bg-sky-600 rounded-lg text-white">Steps</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method ="POST" action="{{ route('admin.steps.update',$step->id) }}" enctype="multipart/form-data w-1/2">
                  @csrf
                  @method('PUT')

                  <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                    <div class="mt-1">
                      <input type="text" id="name"  name="name" value="{{$step->name}}"
                      class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('name')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="sm:col-span-6 pt-5">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                      <input type="text" id="status"  name="status" value="{{$step->status}}"
                      class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('status')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="sm:col-span-6">
                    <label for="handler" class="block text-sm font-medium text-gray-700"> Employee Name </label>
                    <div class="mt-1">
                      <input type="text" id="handler"  name="handler" value="{{$step->handler}}"
                      class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('handler')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mt-6 p-4">
                    <button type="submit" 
                    class="py-2 px-4  bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                        Update
                    </button>  
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</x-admin-layout>

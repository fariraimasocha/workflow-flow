<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  

                    <div class="flex px-4 mt-4 py-3 space-x-2 px">

                        <div class="card card-compact w-68 bg-slate-400 shadow-xl rounded-lg px-5">
                            <div class="card-body">
                              <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Total</h1>
                                 <h1 class="flex items-center text-5xl font-extrabold dark:text-white">{{$totalCount }}<span 
                                  class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200
                                   dark:text-blue-800 ml-2">projects</span></h1>
                              <div class="card-actions justify-end">
                              </div>
                            </div>
                          </div>

   
                        <div class="card card-compact w-53 bg-sky-400 shadow-xl rounded-lg px-5">
                          <div class="card-body">
                            <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Pending</h1>
                               <h1 class="flex items-center text-5xl font-extrabold dark:text-white">{{$pendingCount}}<span 
                                class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200
                                 dark:text-blue-800 ml-2">projects</span></h1>
                            <div class="card-actions justify-end">
                            </div>
                          </div>
                        </div>
                      
                        <div class="card card-compact w-68 bg-slate-400 shadow-xl rounded-lg px-5">
                          <div class="card-body">
                            <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Completed</h1>
                               <h1 class="flex items-center text-5xl font-extrabold dark:text-white">{{$completedCount}}<span 
                                class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200
                                 dark:text-blue-800 ml-2">projects</span></h1>
                            <div class="card-actions justify-end">
                            </div>
                          </div>
                        </div>
                    
                        <div class="card card-compact w-56 bg-red-400 shadow-xl rounded-lg px-5">
                          <div class="card-body">
                            <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Rejected</h1>
                               <h1 class="flex items-center text-5xl font-extrabold dark:text-white">{{$rejectedCount}}<span 
                                class="bg-red-100 red-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200
                                 dark:text-blue-800 ml-2">projects</span></h1>
                            <div class="card-actions justify-end">
                            </div>
                          </div>
                        </div>
                    
                      </div>
                </div>
            </div>
        </div>
    </div>

      
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2 space-x-2">
    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-fuchsia-500 hover:bg-sky-600 rounded-lg text-white">Add project</a>
    <a href="{{ route('admin.employees.create') }}" class="px-4 py-2 bg-fuchsia-500 hover:bg-sky-600 rounded-lg text-white">Add Employee</a>
    </div>

    <div class="relative overflow-x-auto lg py-3 px-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 py-3 px-3">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Bill
                  </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach($projects as $project)
              <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$project->name}}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$project->description}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$project->status}}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 $ {{$project->bill}}
              </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="px-6 py-4 bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600">Update</a>
                        <form class="px-4 py-2  bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600"
                             method="POST"
                             action="{{ route('admin.projects.destroy', $project->id) }}"
                             onsubmit="return confirm('Are you sure ?');">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="inline-flex items-center px-4 py-2">Delete</button>
                        </form>
            
                    </div>
                </td>
            </tr>
                  
              @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>

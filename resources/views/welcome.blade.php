<x-guest-layout>


  <div class="flex px-4 mt-4 py-3 space-x-2 px">

   
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

    
    <div class="card card-compact w-56 bg-red-400 shadow-xl rounded-lg px-5">
      <div class="card-body">
        <h1 class="flex items-center text-5xl font-extrabold dark:text-white">Total</h1>
           <h1 class="flex items-center text-5xl font-extrabold dark:text-white">{{$pendingCount + $rejectedCount + $completedCount}}<span 
            class="bg-red-100 red-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200
             dark:text-blue-800 ml-2">projects</span></h1>
        <div class="card-actions justify-end">
        </div>
      </div>
    </div>

  </div>



<div class="p-6 mt-4 px-10">
  <form action="{{url('/')}}" method="GET" class="mb-5">
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="search" 
            value="{{ request()->get('search') }}" 
            class="form-control rounded-lg" 
            placeholder="Search..." 
            aria-label="Search" 
            aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
    </div>
</form>
</div>


<div class="relative overflow-x-auto lg">
  <table class="w-9/12 text-sm text-left text-gray-500 dark:text-gray-400">
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
            ${{$project->bill}}
        </td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <div class="flex space-x-2">

                <a href="{{ route('projects.show', $project->id) }}" class="px-6 py-4 bg-slate-200 hover:bg-slate-60  rounded-lg text-red-600">View</a>
      
              </div>
          </td>
      </tr>
            
        @endforeach
      </tbody>
  </table>
</div>

 
</x-guest-layout>
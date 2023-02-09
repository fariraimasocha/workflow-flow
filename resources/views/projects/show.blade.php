
    <x-guest-layout>
      
      <div class="p-6 mt-4 px-10">
        @foreach ($project->steps as $step)
        <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">                  
            <li class="mb-10 ml-6">            
                <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                    <svg aria-hidden="true" class="w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                </span>
                <h3 class="font-medium leading-tight">{{$step->name}}</h3>
                <p class="text-sm">Script by :{{$step->handler}}</p>
            </li>
            <li class="ml-6"> 
                <h3 class="font-medium leading-tight">.</h3>
                <p class="text-sm">.</p>
            </li>
        </ol>
        @endforeach
        <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">                  
            <li class="ml-6">
                <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </span>
                <h3 class="font-medium leading-tight">Publish</h3>
                <p class="text-sm">project complete</p>
            </li>
        </ol>
        </div>

        
        <div class="container w-full px-5 py-6 mx-auto ">
            <div class="grid lg:grid-cols-4 gap-y-6 ">
                @foreach ($project->steps as $step)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg bg-sky-10">
                    <div class="px-6 py-4">
                      <h4 class="mb-3 text-xl font-semibold tracking-tight text-sky-400  hover:text-green-400 uppercase">
                        {{ $step->name }}
                    </h4>

                 

                      <div class="flex mb-2">
                        <span class="px-4 py-0.5 text-sm bg-pink-500 rounded-full text-pink-50">{{ $step->handler }}</span>
                      </div>
                      <a href="{{ route('projects.show', $step->id) }}">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600  hover:text-green-400 uppercase">
                            {{ $step->status }}
                        </h4>
                      </a>
                    </div>
                </div>
                @endforeach
            </div>
    </x-guest-layout>

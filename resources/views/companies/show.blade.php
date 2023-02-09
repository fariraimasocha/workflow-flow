<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">

            @foreach ($company->employees as $employee)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="/images/office.jpg"alt="Image"/>
                <div class="px-6 py-4">
                  <div class="flex mb-2">
                    <span class="px-4 py-0.5 text-sm bg-pink-500 rounded-full text-pink-50">{{ $employee->name}}</span>
                  </div>
                  <p class="leading-normal text-gray-700">{{$employee->description}}</p>
                  <div class="flex mb-2">
                    <span class="px-4 py-0.5 text-sm bg-pink-500 rounded-full text-pink-50">{{ $employee->id}}</span>
                  </div>
                  <a href="{{ route('companies.show', $employee->phone_number) }}">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600  hover:text-green-400 uppercase">{{$employee->account_number}}</h4>
                  </a>
                </div>
            </div>
       
            @endforeach
        </div>
</x-guest-layout>
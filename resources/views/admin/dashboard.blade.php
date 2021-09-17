<div class="m-2">
    @section('title','Dashboard')
    <h1 class="text-2xl text-gray-500 font-semibold mb-3 mt-2">Dashboard</h1>
    <div class="-my-2  sm:-mx-6 ">
        <div class="py-2 space-y-4 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="w-2/4 flex justify-between space-x-10 space-y-2">
                    <input type="text" wire:model='search'
                        class="flex-1 pl-3 w-full form-input py-2   border border-gray-300 placeholder-gray-500 text-gray-900  rounded focus:outline-none focus:border-indigo-500   transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        placeholder="Search transaction...">

                    <a wire:click="$toggle('ShowFilter')" class=" cursor-pointer text-gray-400 hover:text-gray-800 ">
                        @if($ShowFilter) Hide @endif Advanced search...</a>
                </div>



                <div class="flex items-center space-x-2">

                    <div class="relative">
                        <select wire:model="PerPages"
                            class="rounded shadow-xs cursor-pointer h-full  border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                            <option value="5">Per Page</option>

                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>


                    <div wire:click.prevent="ExportSelected" class="p-1 md:w-40 ">
                        <div
                            class="flex items-center p-2 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100">


                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 fill-current hover:text-gray-100"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <div>
                                <p class="text-xs font-medium ml-2 ">
                                    CSV import
                                </p>

                            </div>
                        </div>
                    </div>
                    <div x-data="{ dropdownOpen: false }" class="relative ">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative z-10 block bg-gray-800 rounded  p-2 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                            <span
                                class="flex bg-gray-800 text-white font-medium hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Bulk
                                Actions

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>


                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white  rounded-md overflow-hidden shadow-xl z-20">
                            <a href="#" wire:click.prevent="ExportSelected"
                                class="flex px-2 py-2 text-sm  text-gray-800 border-b hover:bg-gray-200">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none"
                                    class="text-gray-400  pl-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                <span class="px-2">Export</span>
                            </a>
                            <a href="#" wire:click.prevent="deleteSelected"
                                class="flex px-2 py-2 text-sm  text-gray-800 border-b hover:bg-gray-200">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none"
                                    class="text-gray-400  pl-1" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="px-2">Delete</span>
                            </a>
                        </div>
                    </div>


                </div>
            </div>

            <!-- component -->


            <div>



                @if ($ShowFilter)

                <div class="my-3 px-2">
                    <div class="bg-cool-gray-200 p-4 ">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <span wire:click="ResetFilters"
                                class="float-right text-xl space-x-4 mx-3  py-2 text-gray-400 hover:text-gray-800 ">
                                Reset Filters
                            </span>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">Status</label>
                                        <select wire:model="filters.status" id="country" name="country"
                                            autocomplete="country"
                                            class=" mt-2 w-full py-1 px-3 border border-gray-300 bg-white rounded-md shadow-sm pl-6 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"">
                                      <option   selected>select status...</option>
                      
                                            <option value=" processing">Processing</option>
                                            <option value="failed">Failed</option>
                                            <option value="success">Success</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price" class=" text-sm font-medium text-gray-700 m">Minimum
                                            Date</label>
                                        <div class="max-w-lg flex rounded-md shadow-sm mt-2">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </span>
                                            <input type="date" wire:model="filters.date-min" placeholder="DD/MM/YYYY"
                                                class="flex-1 form-input block w-full py-1 pl-2  border border-gray-400 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />

                                        </div>
                                    </div>




                                    <div class="col-span-6 sm:col-span-3">
                                        <label class=" text-sm font-medium text-gray-700 m">Maximum Date</label>
                                        <div class="max-w-lg flex rounded-md shadow-sm mt-2">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </span>
                                            <input type="date" wire:model="filters.date-max" placeholder="DD/MM/YYYY"
                                                class="flex-1 form-input block w-full py-1 pl-2  border border-gray-400 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if ($transactions->IsNotEmpty())
                    @if ($selected)
                    <span class="ml-2 space-x-2 uppercase text-gray-400 hover:text-gray-700"> selected
                        <span>{{count($selected)}}</span> {{Str::plural('Transaction',count($selected))}} </span>
                    @endif
                    <div class="shadow  overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="flex-col space-y-2">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">

                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs  text-gray-500 ">
                                            <input type="checkbox" class="form-checkbox h-3 w-5 text-gray-600"
                                                wire:model="selectedPageRow">
                                        </th>
                                        <th wire:click="SortBy('title','asc')" scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div class="flex space-x-1">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        @if ($sortDirection =='asc')
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                        @else
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                        @endif
                                                    </svg>
                                                </span>
                                                <span>Title</span>
                                            </div>
                                        </th>
                                        <th wire:click="SortBy('amount','asc')" scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div class="flex space-x-1">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        @if ($sortDirection =='asc')
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                        @else
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                        @endif
                                                    </svg>
                                                </span>
                                                <span>Amount</span>
                                            </div>
                                        </th>
                                        <th wire:click="SortBy('status','asc')" scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div class="flex space-x-1">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        @if ($sortDirection =='asc')
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                        @else
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                        @endif
                                                    </svg>
                                                </span>
                                                <span>Status</span>
                                            </div>
                                        </th>
                                        <th wire:click="SortBy('date','asc')" scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div class="flex space-x-1">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        @if ($sortDirection =='asc')
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                        @else
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                        @endif
                                                    </svg>
                                                </span>
                                                <span>Date</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($transactions as $transaction)
                                    <tr wire:loading.class.delay="opacity-50" class="cursor-pointer text-sm">

                                        <td class=" font-medium text-xs text-cool-gray-900 px-6 py-4 whitespace-nowrap">
                                            <input type="checkbox" class="form-checkbox h-3 w-5 text-gray-600"
                                                wire:model="selected" value="{{$transaction->id}}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg viewBox="0 0 20 20" class="h-5 w-4" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div class="ml-4">
                                                    <div class="text-sm text-gray-500 truncate">
                                                        {{$transaction->title}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" font-medium text-xs text-cool-gray-900 px-6 py-4 whitespace-nowrap">
                                            <span>${{$transaction->amount}}</span> USD
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap ">
                                            <span
                                                class="px-2 inline-flex items-center capitalize  text-xs leading-4 px-2.5 py-0.5 font-semibold  rounded-full bg-{{$transaction->status_color}}-100 text-{{$transaction->status_color}}-800">
                                                {{$transaction->status}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{$transaction->date_for_humans}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="py-2 px-2">
                                {{$transactions->links()}}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="flex justify-center items-center space-x-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="text-cool-gray-500 uppercase">No Transactions were Found...</span>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>

</div>

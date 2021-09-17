    <div class="m-5">
        <h1 class="text-2xl font-semibold text-gray-900">Profile</h1>

        <form wire:submit.prevent="save">
            <div class="mt-6 sm:mt-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="username" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Username
                    </label>

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                username.com/
                            </span>
                            <input wire:model="username" id="username"
                                class="flex-1 form-input block w-full py-2 pl-2  border border-gray-400 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        
                        </div>
                        @error('username')<span class="text-xs text-red-500 mt-5">{{$message}}</span>@enderror
                        
                    </div>

                </div>

                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Birthday
                    </label>

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div x-data="" x-init="new Pikaday({ field: $refs.input,format:'MM/DD/YYYY'})"
                            class="max-w-lg flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input x-ref="input" wire:model.lazy="birthday" placeholder="DD/MM/YYYY"
                                class="flex-1 form-input block w-full py-2 pl-2  border border-gray-400 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />

                        </div>
                        @error('birthday')<span class="text-xs text-red-500 mt-5">{{$message}}</span>@enderror

                    </div>
                </div>



                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="about" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        About
                    </label>

                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div wire:ignore class="mt-1 sm:mt-0 sm:col-span-2">
   
                            <input id="x"  type="hidden" >
                            <trix-editor wire:model="about" input="x" placeholder="write something"></trix-editor>
                        
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>


                        </div>

                        @error('about')<span class="text-xs text-red-500 mt-5">{{$message}}</span>@enderror

                        
                </div>
                </div>

                <div
                    class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
                        Photo
                    </label>

                    <div class="mt-2 sm:mt-0 sm:col-span-2">
                        <div class="space-x-3 flex items-center">
                            <span wire:loading wire:target="NewAvatar" class="uppercase">updating..</span>

                            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">

                                @if ($NewAvatar)
                                <img class="" src="{{$NewAvatar->temporaryUrl()}}" alt="Profile photo">
                                @else
                                <img class="" src="{{auth()->user()->imagepath}}" alt="Profile photo">
                    
                                @endif
                            </span>
                    
                            <input wire:model="NewAvatar" type="file" id="file" class="hidden">
                    
                            <span class="ml-5 rounded-md shadow-sm">
                                <label for="file"
                                    class="py-2 cursor-pointer px-2 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                    Change
                                </label>
                            </span>


                           
                        </div>
                       
                    
                    
                    </div>
                </div>
            </div>


            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="space-x-3 flex justify-end items-center">


                    <div>
                        @if (session()->has('notify-saved'))
                        <span x-data="{open:true}" x-init="setTimeout(()=>{open =false},2500)"
                            x-show.transition.duration.1000ms="open" class="text-gray-500 mx-2">Profile Saved !
                        </span>
                        @endif
                    </div>
                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="button"
                            class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            Cancel
                        </button>
                    </span>

                    <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>

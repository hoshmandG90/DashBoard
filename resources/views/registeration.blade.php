<div>
    @section('title','Register')

    @guest
     <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto w-auto h-24  rounded rounded-circle  rounded-circle" src="{{asset('assets/img/2042780.gif')}}"
                    alt="Workflow">


            </div>
            <div class="mt-8 sm:max-auto sm:w-full sm:max-w-full">
                <div class="bg-white py-8 px-4 shadow sm-rounded sm:px-10">


                    <form class="mt-8 space-y-6" wire:submit.prevent="register" method="POST">
                        @csrf
                        <div class="rounded-md shadow-sm  py-2 my-3 space-y-2">

                            <div>
                                <label for="email-address" class="block text-sm font-medium  mb-2 leading-5 text-gray-700">Full name</label>
                                <input wire:model="fullname" id="email-address" name="email" type="text"
                                    autocomplete="fullname" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Full Name">
                                @error('fullname')
                                <span class="mt-1 text-red-500 text-sm">{{$message}}</span>

                                @enderror


                            </div>
                            <div >
                                <label for="email-address" class="block text-sm font-medium  mb-2 leading-5 text-gray-700">Email address</label>
                                <input wire:model="email" id="email-address" name="email" type="email"
                                    autocomplete="email" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Email address">
                                @error('email')
                                <span class="mt-1 text-red-500 text-sm">{{$message}}</span>

                                @enderror


                            </div>
                            <div>
                                <label for="password2" class="block text-sm leading-5 font-medium  mt-2 mb-2 text-gray-700">Password</label>
                                <input wire:model="password" type="password"id="password2" name="password" type="password" autocomplete="current-password"
                                    
                                    class="appearance-none rounded-none relative block w-full px-3 py-2  border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Password">
                                @error('password')
                                <span class="mt-1 text-red-500 text-sm">{{$message}}</span>

                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm leading-5  mt-2 mb-2 font-medium text-gray-700">Password Confirmation</label>
                                <input wire:model="passwordConfirmation" id="password" name="password" type="password"
                                    autocomplete="current-password" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Password">
                            </div>
                        </div>


                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                
                                Create New Account 
                            </button>
                        </div>
                        <div class="text-center mt-2 mb-3">
                        <a href="{{route('login')}}" class="font-medium hover:text-indigo-700 text-indigo-400">Already Have An Account?</a>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>    
    @endguest
   



</div>

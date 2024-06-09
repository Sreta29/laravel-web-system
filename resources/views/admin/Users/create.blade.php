@extends('layouts.app') <!-- Extend the master.blade.php file -->

@section('content') <!-- Start the content section -->
<section class="w-full bg-white dark:bg-gray-900">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add New User</h2>
        <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                  <div class="bg-green-500 text-white px-4 py-2 rounded">
                    <!-- Alert content goes here -->
                    {{ Session::get('message') }}
                  </div>
        @endif
    <form method="post" action="{{ route('configuration.users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="sm:col-span-5">
              <select id="roles" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Role</option>
                @foreach($roles as $role)
                <option value="{{$role->rolename}}">{{$role->rolename}}</option>
                @endforeach
            </select>
                </div>
            @error('orderid')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
              </div>
              <div class="sm:col-span-5">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                  <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
              </div>
              <div class="sm:col-span-5">
                  <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                  <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  @error('username')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
              </div>
              <div class="sm:col-span-5">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
              </div>

              <div class="sm:col-span-5">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                  <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
              </div>
              
              <div class="sm:col-span-2">
                  <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                  <input type="radio" name="status" value="1" class="p-2 border rounded-md"> 
                    <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                  <input type="radio" name="status" value="0" class="p-2 border rounded-md"> 
                    <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                  @error('orderid')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
              </div>
          </div>
          <div class="flex items-center space-x-4">
          <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            Submit
          </button>
              <a href="{{ route('configuration.users.index') }}" class="button-style">
              <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                  Cancel
              </button>
          </div>
    </form>
    </div>
</section>
@endsection <!-- End the content section -->

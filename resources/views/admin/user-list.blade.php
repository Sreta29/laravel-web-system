@extends('layouts.app') <!-- Extend the master.blade.php file -->

@section('content') <!-- Start the content section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border rounded shadow p-4">
              <div class="border-b p-2">
                <!-- Header content goes here -->
                Add New User
              </div>
              <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                  <div class="bg-green-500 text-white px-4 py-2 rounded">
                    <!-- Alert content goes here -->
                    {{ Session::get('message') }}
                  </div>
                @endif
                <form method="post" action="" enctype="multipart/form-data">
                @csrf
                    <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">Role</td>
                            <td class="px-6 py-4">
                                <select name="role" class="p-2 border rounded-md w-full">
                                    <option value="system admin" {{ old('role') == 'system admin' ? 'selected' : '' }}>System Admin</option>
                                    <option value="hr manager" {{ old('role') == 'hr manager' ? 'selected' : '' }}>HR Manager</option>
                                    <option value="collector" {{ old('role') == 'collector' ? 'selected' : '' }}>Collector</option>
                                </select>
                                @error('role')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <!-- ... similar for other rows ... -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Name</td>
                            <td class="px-6 py-4">
                                <input type="text" name="name" value="{{ old('name') }}" class="p-2 border rounded-md w-full">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>                     
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Username</td>
                            <td class="px-6 py-4">
                                <input type="text" name="username" value="{{ old('username') }}" class="p-2 border rounded-md w-full">
                                @error('username')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Email</td>
                            <td class="px-6 py-4">
                                <input type="text" name="email" value="{{ old('email') }}" class="p-2 border rounded-md w-full">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Status</td>
                            <td class="px-6 py-4">
                                <select name="status" class="p-2 border rounded-md w-full">
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="not available" {{ old('status') == 'not available' ? 'selected' : '' }}>Not Available</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Submit
                                </button>
                                
                                <a href="{{ route('admin.user-list') }}" class="button-style">
   <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
      Cancel
   </button>
</a>
                                      
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </form>

              </div>
            </div>
        </div>
    </div>
@endsection <!-- End the content section -->

@extends('layouts.app') <!-- Extend the master.blade.php file -->
@section('content') <!-- Start the content section -->
<section class="w-full bg-white dark:bg-gray-900">
    <div class="w-full px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add New Order List</h2>
        <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                    <div class="bg-green-500 text-white px-4 py-2 rounded">
                        <!-- Alert content goes here -->
                        {{ Session::get('message') }}
                    </div>
                @endif
        </div>
        <form method="post" action="{{ route('configuration.orderlist.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                @php($user = Auth::user()) 
                    @if($user->role == 'User')
                    <!-- <div class="sm:col-span-2">
                        <label for="orderid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order ID</label>
                        <input type="text" name="orderid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('orderid')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div> -->
                    <div class="sm:col-span-2">
                        <label for="orderdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Date</label>
                        <input type="date" name="orderdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('orderdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zone</label>
                        <input type="text" name="zone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('zone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address_line1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="message" rows="4" name="add_address" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address Line 1"></textarea><br>
                        <!-- <textarea id="message" rows="4" name="address_line2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address Line 2"></textarea> -->
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="phonenum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="phonenum" name="phonenum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('phonenum')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    
                    <div class="sm:col-span-2">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div id="editor" class="h-40 mb-5"></div>
                        <input type="hidden" id="editor-customer" name="customerimg">
                    </div>
                    @endif                    
                    @php($user = Auth::user()) 
                    @if($user->role == 'System Admin')
                        <div class="sm:col-span-2">
                            <label for="collectdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection Date</label>
                            <input type="date" name="collectdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('collectdate')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waste Type</label>
                            <select id="roles" name="wastetype_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Choose a Waste</option>
                                <option value="Oversized Waste">Oversized Waste</option>
                                <option value="Garden Waste">Garden Waste</option>
                            </select>
                            <!-- <input type="text" name="collector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> -->
                            @error('collector')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collector</label>
                            <select id="roles" name="collector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Choose a Collector</option>
                                @foreach($collectors as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" name="collector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> -->
                            @error('collector')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <input type="radio" name="status" value="New" class="p-2 border rounded-md"> 
                                <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">New</label>
                            <input type="radio" name="status" value="Schedule" class="p-2 border rounded-md"> 
                                <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Schedule</label>
                            <input type="radio" name="status" value="Pending" class="p-2 border rounded-md"> 
                                <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pending</label>
                            <input type="radio" name="status" value="Collected" class="p-2 border rounded-md"> 
                                <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Collected</label>
                            @error('orderid')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
                
            <div class="flex items-center space-x-4">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Submit
            </button>

                <a href="{{ route('configuration.categories.index') }}" class="button-style">
                <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</section>
@endsection <!-- End the content section -->
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quillUlasanSemak = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike','image'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ],
            }
        });

        quillUlasanSemak.on('text-change', function() {
            var html = quillUlasanSemak.root.innerHTML;
            document.querySelector('#editor-customer').value = html;
            // @this.set('customerimg', html);
            // console.log('Ulasan:', html);
        });
    });
</script>

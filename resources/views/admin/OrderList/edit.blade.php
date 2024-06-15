@extends('layouts.app') <!-- Extend the master.blade.php file -->
@section('content') <!-- Start the content section -->
<section class="w-full bg-white dark:bg-gray-900">
    <div class="w-full px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Order List</h2>
        <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                    <div class="bg-green-500 text-white px-4 py-2 rounded">
                        <!-- Alert content goes here -->
                        {{ Session::get('message') }}
                    </div>
                @endif
        </div>
        <form method="post" action="{{ route('configuration.orderlist.update', $orderlist->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                @php($user = Auth::user()) 

                @if($user->role == 'User')
                    <div class="sm:col-span-2">
                        <label for="orderdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Date</label>
                        <input type="date" name="orderdate" value="{{ $orderlist->orderdate }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('orderdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zone</label>
                        <input type="text" name="zone" value="{{ $orderlist->zone }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('zone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" value="{{ $orderlist->email }}" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="message" rows="4"  name="add_address" class="block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $orderlist->add_address }}</textarea>
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div id="editor" class="h-40 mb-5"></div>
                        <input type="hidden" id="editor-customer" name="customerimg">
                    </div>
                @endif

                @if($user->role == 'System Admin')
                    <div class="sm:col-span-2">
                        <label for="orderId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Id</label>
                        <input type="text" value="#{{ $orderlist->orderid }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('orderid')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="orderdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Date</label>
                        <input type="date" name="orderdate" value="{{ $orderlist->orderdate }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('orderdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zone</label>
                        <input type="text" name="zone" value="{{ $orderlist->zone }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('zone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" value="{{ $orderlist->email }}" name="email" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phonenum"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="number" value="{{ $orderlist->phonenum }}" name="phonenum" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('phonenum')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="message" rows="4"  name="add_address" class="block p-2.5 w-full text-sm text-black bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." readonly>{{ $orderlist->add_address }}</textarea>
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2 hidden">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div id="editor" class="h-40 mb-5"></div>
                        <input type="hidden" id="editor-customer" name="customerimg" value="{{$orderlist->customerimg}}">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div class="h-48 w-48 mb-5" id="display-container"></div>
                    </div>

                    <div class="sm:col-span-2">
                        <hr class="mt-10">
                    </div>
                    
                    <div class="sm:col-span-2 mt-5">
                        <label for="collectdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection Date</label>
                        <input type="date" name="collectdate" value="{{ $orderlist->collectdate }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('collectdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waste Type</label>
                        <select id="roles" name="wastetype_id" value="{{ $orderlist->wastetype_id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose a Waste</option>
                            <option value="Oversized Waste" {{ $orderlist->wastetype_id == "Oversized Waste" ? 'selected' : '' }} >Oversized Waste</option>
                            <option value="Garden Waste" {{ $orderlist->wastetype_id == "Garden Waste" ? 'selected' : '' }} >Garden Waste</option>
                        </select>
                        <!-- <input type="text" name="collector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> -->
                        @error('collector')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collector</label>
                        <select id="roles" name="collector" value="{{ $orderlist->collector }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose a Collector</option>
                            @foreach($collectors as $item)
                                <option value="{{ $item->name }}" {{ $item->name == $orderlist->collector ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="collector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> -->
                        @error('collector')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <input type="radio" name="status" value="New" class="p-2 border rounded-md" {{ $orderlist->status == 'New' ? 'checked' : '' }}> 
                            <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">New</label>
                        <input type="radio" name="status" value="Schedule" class="p-2 border rounded-md" {{ $orderlist->status == 'Schedule' ? 'checked' : '' }}> 
                            <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Schedule</label>
                        <input type="radio" name="status" value="Pending" class="p-2 border rounded-md" {{ $orderlist->status == 'Pending' ? 'checked' : '' }}> 
                            <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pending</label>
                        <input type="radio" name="status" value="Collected" class="p-2 border rounded-md" {{ $orderlist->status == 'Collected' ? 'checked' : '' }}> 
                            <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Collected</label>
                        @error('orderid')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                   

                @endif

                @if($user->role == 'Wastage Collector')
                    <div class="sm:col-span-2">
                        <label for="orderId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Id</label>
                        <input type="text" value="#{{ $orderlist->orderid }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('orderdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="orderdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Date</label>
                        <input type="date" name="orderdate" value="{{ $orderlist->orderdate }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('orderdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2 mt-5">
                        <label for="collectdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection Date</label>
                        <input type="date" name="collectdate" value="{{ $orderlist->collectdate }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('collectdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phonenum"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="phonenum" value="{{ $orderlist->phonenum }}" name="phonenum" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                        @error('phonenum')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="message" rows="4"  name="add_address" class="block p-2.5 w-full text-sm text-black bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." readonly>{{ $orderlist->add_address }}</textarea>
                        @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2 hidden">
                        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div id="editor" class="h-40 mb-5"></div>
                        <input type="hidden" id="editor-customer" name="customerimg" value="{{$orderlist->customerimg}}">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Evidence and Remark</label>
                        <div class="h-48 w-48 mb-5" id="display-container"></div>
                    </div>

                    <div class="sm:col-span-2">
                        <hr class="mt-10">
                    </div>

                    <div class="sm:col-span-2 mt-5">
                        <label for="collector" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collector Evidence and Remark</label>
                        <div id="editor-collector" class="h-40 mb-5"></div>
                        <input type="hidden" id="editor-collect" name="collectorimg" value="{{$orderlist->collectorimg}}">
                    </div>
                @endif
            </div>
            <div class="flex items-center space-x-4 mt-10">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Submit
            </button>

                <a href="{{ route('configuration.orderlist.index') }}" class="button-style">
                <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
            </div>
        </form>
    </div>
</section>
@endsection <!-- End the content section -->

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


        quillUlasanSemak.root.innerHTML = document.querySelector('#editor-customer').value;

        quillUlasanSemak.on('text-change', function() {
            var html = quillUlasanSemak.root.innerHTML;
            document.querySelector('#editor-customer').value = html;
            // @this.set('customerimg', html);
            // console.log('Ulasan:', html);
        });

        var img = document.querySelector('#editor-customer').value;

        document.querySelector('#display-container').innerHTML = img;

        //collector
        var quillCollector = new Quill('#editor-collector', {
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

        quillCollector.root.innerHTML = document.querySelector('#editor-collect').value;

        quillCollector.on('text-change', function() {
            var html = quillCollector.root.innerHTML;
            document.querySelector('#editor-collect').value = html;
            // @this.set('customerimg', html);
            // console.log('Ulasan:', html);
        });

    });
</script>
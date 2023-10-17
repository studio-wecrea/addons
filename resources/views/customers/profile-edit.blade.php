@extends('layouts.app')

@section('content')

    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="{{ route('/') }}" class="text-yellow-600 text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-sm text-gray-600 font-medium">Account</p>
    </div>
    <!-- breadcrums end -->
    @if(!empty($user))
    <form class="" action="{{ route('customers.profile-update', $user->id) }}" method="POST" enctype="multipart/form-data"> @endif
        @csrf
        @method('PUT')

    <!-- Account wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        <!-- sidebar -->
        
        <div class="col-span-3">
            <!-- account profile -->
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-shrink-0">
                @if(isset($customer->image))
                <img src="{{$customer->image}}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                @else
                <img src="{{url('images/profile.png')}}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                @endif
                </div>
                <div class="flex-grow">
                    <p class="text-sm text-gray-600">Hello,</p>
                    @if(!empty($user))
                    <h4 class="text-sm text-gray-800 font-medium">
                        {{$user->firstname}} {{$user->lastname}}
                    </h4>
                    @endif
                </div>
            </div>
            <!-- account profile end -->

            <!-- profile links -->
            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <!-- single link -->
                <div class="space-y-1 pl-8">
                    <a href="#" class="text-sm relative text-yellow-600 block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-sm">
                            <i class="far fa-address-card"></i>
                        </span>
                        Manage account
                    </a>
                    <a href="{{ route('customers.profile-edit') }}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        Profile info
                    </a>
                    <a href="{{ route('customers.address') }}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        Manage address
                    </a>
                    <a href="{{ route('customers.password') }}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        Change password
                    </a>
                </div>
                <!-- single link end -->
                <!-- single link -->
                <div class="space-y-1 pl-8 pt-4">
                    <a href="{{route('orders.history')}}" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-sm">
                            <i class="fa fa-gift"></i>
                        </span>
                        My Order History
                    </a>
                    <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        My Returns
                    </a>
                    <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        My Cancellations
                    </a>
                    <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        My Reviews
                    </a>
                </div>
                <!-- single link end -->
                <!-- single link -->
                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-sm">
                            <i class="far fa-credit-card"></i>
                        </span>
                        Payment Methods
                    </a>
                    <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                        Voucher
                    </a>
                </div>
                <!-- single link end -->
                <!-- single link -->
                <div class="space-y-1 pl-8 pt-4">
                    <a href="{{ route('orders.wishlist') }}" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-sm">
                            <i class="far fa-heart"></i>
                        </span>
                        My Wishlist
                    </a>
                </div>
                <!-- single link end -->
                <!-- single link -->
                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-sm">
                            <i class="fa fa-sign-out"></i>
                        </span>
                        Logout
                    </a>
                </div>
                <!-- single link end -->
            </div>
            <!-- profile links end -->
        </div>
        <!-- sidebar end -->
        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

        <!-- Profile info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <h4 class="text-lg font-medium capitalize mb-6">
                Profile Information
            </h4>
            <div class="space-y-4">
            <label for="image" class="text-sm text-gray-600 mb-2 block">Image</label>
                        <div class="inline-flex w-full">
                            <img id="avatar" @if(!empty($user->image))src="{{$user->image}}" @else src="{{ url('/images/profile.png') }}"@endif class="w-10 h-10 rounded-full mr-4">
                            <input  id="image" name="image" type="file" onchange="readURL(this);" class="block w-full h-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>
                <!-- form row -->
                <div class="grid grid-cols-2 gap-4">
                     <!-- single input -->
                        <div>
                            <label for="firstname" class="text-sm text-gray-600 mb-2 block">Firstname</label>
                            <input type="text" name="firstname" class="input-box" @if(!empty($user)) value="{{$user->firstname}}" @endif>
                        </div>
                        <!-- single input end -->
                        <!-- single input -->
                        <div>
                            <label for="lastname" class="text-sm text-gray-600 mb-2 block">Lastname</label>
                            <input type="text" class="input-box" name="lastname" @if(!empty($user)) value="{{$user->lastname}}" @endif>
                        </div>
                        <!-- single input end -->
                </div>
                <!-- form row end -->
                <!-- form row -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- single input -->
                        <div>
                            <label for="birthday" class="text-sm text-gray-600 mb-2 block">Birthday</label>
                            <input type="date" name="birthday" class="input-box">
                        </div>
                        <!-- single input end -->
                        <!-- single input -->
                        <div>
                            <label for="gender" class="text-sm text-gray-600 mb-2 block">Gender</label>
                            <select name="" id="" class="input-box">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                        <!-- single input end -->
                </div>
                <!-- form row end -->
                <!-- form row -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- single input -->
                        <div>
                            <label for="email" class="text-sm text-gray-600 mb-2 block">Email address</label>
                            <input type="email" name="email" class="input-box" @if(!empty($user)) value="{{$user->email}}" @endif>
                        </div>
                        <!-- single input end -->
                        <!-- single input -->
                        <div>
                            <label for="phone" class="text-sm text-gray-600 mb-2 block">Phone</label>
                            <input type="text" name="phone" class="input-box" @if(!empty($user->phone)) value="{{$user->phone}}" @else placeholder="Enter phone number" @endif>
                        </div>
                        <!-- single input end -->
                </div>
                <!-- form row end -->
                <div class="mt-4 inline-flex space-x-2">
                    <button type="submit" class="text-sm bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">Save changes</button>
                    <a href="{{route('customers.account')}}" class="text-sm inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150">Cancel</a>
                </div>
            </div>
        </div>
        <!-- Profileinfo end -->

    </div>


    <!-- Account wrapper end -->
    </form>


    <script type="text/javascript">
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#avatar')
        .attr('src', e.target.result)
        .width(50)
        .height(40);
    };
    reader.readAsDataURL(input.files[0]);
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById("form-test");
    if(form){
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            console.info("OK");
        })
    }
});
}
</script>

@endsection
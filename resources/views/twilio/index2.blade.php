@extends('custom-theme.master2')
@section('cdn')
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section('content')


<!-- ==========Banner-Section========== -->
<!-- This is an example component -->
<div class="my-32">
    
@if($s_enter)
<!-- Session Access -->
  <div class="overflow-hidden px-3 overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex bg-black bg-opacity-50">
                      <div class="relative my-6 mx-auto container w-full md:w-2/3 lg:w-1/2">
                        <!--content-->
                        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full outline-none bg-gray-300 focus:outline-none">
                          <!--header-->
                          <div class="p-5 border-b border-solid border-gray-300 rounded-lg">
                        
                            <h3 class="text-2xl font-semibold text-black text-center font-sans mt-2">
                               {{ $s_enter }}
                            </h3>
                            @if($s_invalid)
                            <p class="text-sm font-semibold text-red-600 text-center font-sans">
                               {{ $s_invalid }}
                            </p>
                            @endif
                            <form action="{{ route('tw.session.connect', ['roomName' => $roomName ]) }}" method="GET" id="session_access_pass_form">
                                @csrf
                            <div class="flex flex-wrap mt-2">
                                    <div class="w-full">
                                  <input class="appearance-none block w-full bg-gray-100 text-gray-700 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white rounded-lg" placeholder="Session Pass.." 
                                  id="s_pass" 
                                  type="s_pass"
                                  name="s_pass"
                                  autocomplete="off"
                                  >
                                </div>
                            </div>
                            </form>
                          </div>
                        </div> 
                      </div>
                  </div>

 @endif
<!-- End Session Access -->

 @if(session()->has('room_session_created'))
<!--Modal-->
  <div class="overflow-hidden px-3 overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex bg-black bg-opacity-50">
                      <div class="relative my-6 mx-auto container w-full md:w-2/3 lg:w-1/2">
                        <!--content-->
                        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full outline-none bg-gray-300 focus:outline-none">
                          <!--header-->
                          <div class="p-5 border-b border-solid border-gray-300 rounded-lg">
                        
                            <h3 class="text-2xl font-semibold text-black text-center font-sans flex flex-col space-y-2 my-2">
                              Session Created
                            </h3>
                            <p class="text-indigo-500 my-2 text-lg text-center font-medium"> <b class="text-teal-600"> Session Link: </b> <a href="{{ session()->get('room_session_created.roomLink') }}">{{ session()->get('room_session_created.roomLink') }}</a> </p>
                            <p class="text-indigo-500 mt-1 text-lg text-center font-medium"> <b class="text-teal-600"> Session Pass: </b> {{ session()->get('room_session_created.roomPass') }} </p> 
                            
                          </div>
                        </div> 
                      </div>
                  </div>

 @endif        
</div>
<!-- ==========Profile-Section========== -->


{{-- <div class="favorite-list-item">
    
    	@if($user->studentProf->profile_img)
    	<div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        	style="background-image: url('{{asset('student_uploads/profile_images/'.$user->studentProf->profile_img)}}');"> 
        </div>
        @endif
        @if(url($user['profile_image']))
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
          style="background-image: url('{{url($user['profile_image'])}}');">
      	</div>
      	@endif
    <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
</div> --}}
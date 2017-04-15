<ul class="profile-cp-list">
  <li class="{{basename(Request::path())=='edit'? 'active' : ''}}"><a href="{{ route('getEditUser', ['username' => Auth::user()->username]) }}">Personal Information</a></li>
  <li class="{{basename(Request::path())=='privacy_settings'? 'active' : ''}}"><a href="{{ route('getEditUserPrivacy', ['username' => Auth::user()->username]) }}">Privacy Settings</a></li>
  <li class="{{basename(Request::path())=='contact_settings'? 'active' : ''}}"><a href="{{ route('getEditUserContact', ['username' => Auth::user()->username]) }}">Contact Settings</a></li>
  <li class="{{basename(Request::path())=='change_password'? 'active' : ''}}"><a href="/user/{{$user->username}}/edit/change_password">Change Password</a></li>
</ul>

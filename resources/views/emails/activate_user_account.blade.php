@component('mail::message')
#  Activate Your account
@component('mail::panel')
		To activate your account
@endcomponent
@component('mail::button',['url'=>$url])
			Click here
@endcomponent
Thank you.
<br>
Team {{config("app.name")}}
@endcomponent
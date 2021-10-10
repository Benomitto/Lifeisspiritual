@component('mail::message')
#  Thank you for making a purchase
@component('mail::panel')
		To download your book, Click the attachment below
@endcomponent
@component('mail::button',['url'=>$url])
			Download Now
@endcomponent
Thank you.
<br>
Team {{config("app.name")}}
@endcomponent
@component('mail::message')
# Contact Details

- <strong>Name:</strong> {{$data['name']}}
- <strong>Email:</strong> {{$data['email']}}
- <strong>Phone:</strong> {{$data['phone']}}
- <strong>Message:</strong> {{$data['message']}}


Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent

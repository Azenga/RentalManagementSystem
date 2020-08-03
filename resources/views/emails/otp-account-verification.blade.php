@component('mail::message')

# Another security level {{ $user->name }}

The verification key below expire in 2 minutes.

<br>

<h3>{{ $user->otp_token }}</h3>

<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent

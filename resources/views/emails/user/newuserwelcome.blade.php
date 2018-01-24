@component('mail::message')
# Welcome to task manager

you got **new task**.
 
@component('mail::button', ['url' => 'http://facebook.com'])
facebook
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

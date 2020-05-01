@component('mail::message')

# Hi!

## Hello Mr/Mrs {{$name}}
This is the example of markdown email

@component('mail::button',['url'=>'#'])
Custom Button
@endcomponent

@endcomponent
@component('mail::message')
# Notification

This is a friendly notification to notify you that I just completed clearing the inventory trash.

@component('mail::button', ['url' => route('inventory.trash')])
View Trash
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

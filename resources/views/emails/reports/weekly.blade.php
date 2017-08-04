@component('mail::message')
# {{ $admin->company->name }} Weekly Report

Please find a PDF attached in the mail for weekly report of your business at {{ $admin->company->name }}! 

@component('mail::button', ['url' => 'http://165.227.80.94'])
Visit Administration
@endcomponent

Thanks,<br>
EnquiryManager,<br>
Powered By <a href="http://www.trumpetstechnologies.com">Trumpets.</a>
@endcomponent

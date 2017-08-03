<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendWeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends weekly business report to superadmin in e-mail!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admins = User::where('role', 0)->get();
        foreach($admins as $admin) {
         $data['employees'] = $admin->company->employees()->where('role', 2)->get();

         $data['vehicles'] = $admin->company->vehicles()->get();

         $data['financers'] = $admin->company->financers()->get();

         $data['e7days'] = $admin->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))->count();

       
         $data['e7daysSales'] = $admin->company->enquiries()->where('status', 1)->where('created_at', '>', Carbon::now()->subDays(7))->count();

       

         $data['totalEnquiriesVoid'] = $admin->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))->where('status', '0')->count();
         $data['totalEnquiriesConverted'] = $admin->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))->where('status', '1')->count();
         $data['totalEnquiriesCancelled'] = $admin->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))->where('status', '2')->count(); 
        

         $report = \PDF::loadView('reports.weekly', $data);
         $reportData = $report->output();
         $message = new WeeklyReport($admin);
         $message->attachData($invoiceData, 'invoice.pdf', [
                        'mime' => 'application/pdf',
                     ]);
         \Mail::to('waniabhishek47@gmail.com')->send($message);
      }
    }
}

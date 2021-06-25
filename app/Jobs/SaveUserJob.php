<?php

namespace App\Jobs;

use App\Http\Requests\SaveUserRequest;
use App\Models\AdminUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    //private $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SaveUserRequest $request)
    {
        //$this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $request = $this->request;
//        $adminUser = new AdminUser();
//        $adminUser->user_name = $request->user_name;
//        $adminUser->user_email = $request->user_email;
//        $adminUser->password = bcrypt($request->password) ;
//        $adminUser->save();
    }
}

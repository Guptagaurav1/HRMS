<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Tenant;
use App\Models\User;

class SeedTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $tenant;
    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function(){

            $dob =$this->tenant->dob;
            $password_s =date('d-m-Y',strtotime($dob));
            $password = str_replace("-", "", $password_s);
            $enc_password = md5($password);

            User::create([
                'first_name' =>  $this->tenant->first_name,
                'last_name' =>  $this->tenant->last_name,
                'email' =>  $this->tenant->email,
                'password' =>   $enc_password,
                'gender' =>   $this->tenant->gender,
                'phone' =>   $this->tenant->mobile,
                'dob' =>   $this->tenant->dob,
            ]);
        });
    }
}

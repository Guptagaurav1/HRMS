<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;


    public static function getCustomColumns():array
    {
        return[
            'id',
            'first_name',
            'last_name',
            'mobile',
            'email',
            'gender',
            'dob',
            'company_name',
            'company_address',
            'password',
            'domain_name'
        ];
    }
}
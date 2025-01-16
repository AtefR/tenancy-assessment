<?php

namespace App\Models;

use Stancl\Tenancy\Database\Concerns\HasDatabase;
use \TomatoPHP\FilamentTenancy\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
}

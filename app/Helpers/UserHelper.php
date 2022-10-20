<?php

namespace App\Helpers;

class UserHelper
{
    const ROLE_GUEST = null; // used in migration. don't modify
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_CUSTOMER = 3;

    const ROLE_GUEST_UUID = null;
    const ROLE_SUPER_ADMIN_UUID = 'bcf18f0b-1c03-4038-9340-484fe2b63181';
    const ROLE_ADMIN_UUID = 'dc15da7b-6b75-4b7f-958d-14e4f13c6f4e';
    const ROLE_CUSTOMER_UUID = 'c2f96bbc-d048-48af-800c-a8f54b783268';

    const DEFAULT_IS_GUEST = null;
}

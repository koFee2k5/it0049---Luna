<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerAccounts extends BaseController
{
    public function index(): string
    {
        $customers = (new CustomerModel())->orderBy('id', 'ASC')->findAll();

        return view('accounts/customers', ['title' => 'Customer Accounts', 'customers' => $customers]);
    }
}

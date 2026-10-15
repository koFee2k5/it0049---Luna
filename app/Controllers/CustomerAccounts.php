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

    public function new()
    {
        return $this->saveCustomer();
    }

    public function edit(int $id)
    {
        return $this->saveCustomer($id);
    }

    private function saveCustomer(?int $id = null)
    {
        $model = new CustomerModel();
        $customer = $id === null ? null : $model->find($id);
        if ($id !== null && $customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $isEdit = $id !== null;
        $data = ['title' => $isEdit ? 'Edit Customer' : 'New Customer', 'customer' => $customer, 'errors' => [], 'isEdit' => $isEdit];

        if ($this->request->getMethod() === 'POST') {
            $rules = ['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]', 'phone' => 'permit_empty|max_length[20]'];
            if ($this->validate($rules)) {
                $values = ['full_name' => trim((string) $this->request->getPost('full_name')), 'email' => trim((string) $this->request->getPost('email')), 'phone' => trim((string) $this->request->getPost('phone')) ?: null];
                if ($isEdit) {
                    $model->update($id, $values);
                } else {
                    $values['created_at'] = date('Y-m-d H:i:s');
                    $model->insert($values);
                }
                return redirect()->to('/customer-accounts');
            }
            $data['errors'] = $this->validator->getErrors();
            $data['customer'] = array_merge($customer ?? [], $this->request->getPost());
        }

        return view('accounts/customer_form', $data);
    }
}

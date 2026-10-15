<?php

namespace App\Controllers;

use App\Models\BusinessModel;

class Businesses extends BaseController
{
    private const STATUSES = ['Pending', 'Approved', 'Expired', 'Rejected'];

    public function index(): string
    {
        $model = new BusinessModel();
        $query = trim((string) $this->request->getGet('q'));

        if ($query !== '') {
            $model->groupStart()
                ->like('business_name', $query)
                ->orLike('owner_name', $query)
                ->orLike('permit_number', $query)
                ->groupEnd();
        }

        return view('businesses/index', [
            'title'    => 'Business Permits',
            'businesses' => $model->orderBy('id', 'DESC')->findAll(),
            'query'    => $query,
        ]);
    }

    public function new()
    {
        return $this->saveBusiness();
    }

    public function edit(int $id)
    {
        return $this->saveBusiness($id);
    }

    public function delete(int $id)
    {
        $model = new BusinessModel();
        if ($model->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model->delete($id);

        return redirect()->to('/businesses');
    }

    private function saveBusiness(?int $id = null)
    {
        $model = new BusinessModel();
        $business = $id === null ? null : $model->find($id);

        if ($id !== null && $business === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'    => $id === null ? 'New Business Permit' : 'Edit Business Permit',
            'business' => $business,
            'statuses' => self::STATUSES,
            'errors'   => [],
            'isEdit'   => $id !== null,
        ];

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'business_name'    => 'required|max_length[150]',
                'owner_name'       => 'required|max_length[150]',
                'permit_number'    => 'required|max_length[50]',
                'address'          => 'required|max_length[255]',
                'permit_status'    => 'required|in_list[Pending,Approved,Expired,Rejected]',
                'expiration_date'  => 'required|valid_date[Y-m-d]',
            ];
            $errors = [];
            $permitNumber = trim((string) $this->request->getPost('permit_number'));
            $duplicate = $model->where('permit_number', $permitNumber);

            if ($id !== null) {
                $duplicate->where('id !=', $id);
            }

            if ($duplicate->first() !== null) {
                $errors['permit_number'] = 'That permit number is already registered.';
            }

            if ($this->validate($rules) && $errors === []) {
                $values = [
                    'business_name'   => trim((string) $this->request->getPost('business_name')),
                    'owner_name'      => trim((string) $this->request->getPost('owner_name')),
                    'permit_number'   => $permitNumber,
                    'address'         => trim((string) $this->request->getPost('address')),
                    'permit_status'   => $this->request->getPost('permit_status'),
                    'expiration_date' => $this->request->getPost('expiration_date'),
                ];

                if ($id === null) {
                    $values['created_at'] = date('Y-m-d H:i:s');
                    $model->insert($values);
                } else {
                    $model->update($id, $values);
                }

                return redirect()->to('/businesses');
            }

            $data['errors'] = array_merge($this->validator->getErrors(), $errors);
            $data['business'] = array_merge($business ?? [], $this->request->getPost());
        }

        return view('businesses/form', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserAccounts extends BaseController
{
    public function index(): string
    {
        $users = (new UserModel())->orderBy('id', 'ASC')->findAll();

        return view('accounts/users', ['title' => 'User Accounts', 'users' => $users]);
    }

    public function new()
    {
        return $this->saveUser();
    }

    public function edit(int $id)
    {
        return $this->saveUser($id);
    }

    private function saveUser(?int $id = null)
    {
        $model = new UserModel();
        $user = $id === null ? null : $model->find($id);
        if ($id !== null && $user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $isEdit = $id !== null;
        $data = ['title' => $isEdit ? 'Edit User' : 'New User', 'user' => $user, 'errors' => [], 'isEdit' => $isEdit];

        if ($this->request->getMethod() === 'POST') {
            $username = trim((string) $this->request->getPost('username'));
            $rules = ['username' => 'required|max_length[50]', 'full_name' => 'required|max_length[100]'];
            $errors = [];
            $duplicateQuery = $model->where('username', $username);
            if ($isEdit) {
                $duplicateQuery->where('id !=', $id);
            }
            if ($duplicateQuery->first() !== null) {
                $errors['username'] = 'That username is already in use.';
            }
            if ($this->validate($rules) && $errors === []) {
                $values = ['username' => $username, 'full_name' => trim((string) $this->request->getPost('full_name'))];
                if (! $isEdit) {
                    $values['created_at'] = date('Y-m-d H:i:s');
                }
                $file = $this->request->getFile('avatar');
                if ($file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE) {
                    $extension = strtolower($file->getExtension());
                    $mime = $file->getMimeType();
                    if (! $file->isValid() || ! in_array($extension, ['jpg', 'jpeg', 'png'], true) || ! in_array($mime, ['image/jpeg', 'image/png'], true) || $file->getSize() > 2 * 1024 * 1024) {
                        $errors['avatar'] = 'Avatar must be a JPG or PNG no larger than 2MB.';
                    } else {
                        $filename = bin2hex(random_bytes(16)) . '.' . $extension;
                        $uploadPath = FCPATH . 'uploads';
                        if (! is_dir($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                        }
                        $file->move($uploadPath, $filename);
                        service('image')->withFile($uploadPath . DIRECTORY_SEPARATOR . $filename)->fit(400, 400, 'center')->save($uploadPath . DIRECTORY_SEPARATOR . $filename);
                        if ($isEdit && ! empty($user['avatar']) && is_file($uploadPath . DIRECTORY_SEPARATOR . $user['avatar'])) {
                            unlink($uploadPath . DIRECTORY_SEPARATOR . $user['avatar']);
                        }
                        $values['avatar'] = $filename;
                    }
                }
                if ($errors === []) {
                    $isEdit ? $model->update($id, $values) : $model->insert($values);
                    return redirect()->to('/user-accounts');
                }
            }
            $data['errors'] = array_merge($this->validator->getErrors(), $errors);
            $data['user'] = array_merge($user ?? [], $this->request->getPost());
        }

        return view('accounts/user_form', $data);
    }
}

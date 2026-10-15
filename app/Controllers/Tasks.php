<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->select('tasks.*, customers.full_name AS customer_name')->join('customers', 'customers.id = tasks.customer_id', 'left')->orderBy('task_date', 'ASC')->orderBy('tasks.id', 'ASC')->findAll();

        return view('tasks/index', ['title' => 'Task List', 'tasks' => $tasks]);
    }

    public function new()
    {
        return $this->saveTask();
    }

    public function edit(int $id)
    {
        return $this->saveTask($id);
    }

    private function saveTask(?int $id = null)
    {
        $model = new TaskModel();
        $task = $id === null ? null : $model->find($id);
        if ($id !== null && $task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $customers = (new CustomerModel())->orderBy('full_name', 'ASC')->findAll();
        $data = ['title' => $id === null ? 'New Task' : 'Edit Task', 'task' => $task, 'customers' => $customers, 'errors' => [], 'isEdit' => $id !== null];

        if ($this->request->getMethod() === 'POST') {
            $rules = ['title' => 'required|max_length[150]', 'status' => 'required|in_list[pending,in progress,completed,approved,expired,rejected]', 'task_date' => 'required|valid_date[Y-m-d]', 'customer_id' => 'required|is_natural_no_zero'];
            $errors = [];
            $customerId = (int) $this->request->getPost('customer_id');
            if ($customerId > 0 && (new CustomerModel())->find($customerId) === null) {
                $errors['customer_id'] = 'Please select a valid customer.';
            }

            if ($this->validate($rules)) {
                $values = ['title' => trim((string) $this->request->getPost('title')), 'status' => $this->request->getPost('status'), 'task_date' => $this->request->getPost('task_date'), 'customer_id' => $customerId > 0 ? $customerId : null];
                if ($id === null) {
                    $values['created_at'] = date('Y-m-d H:i:s');
                }

                $file = $this->request->getFile('attachment');
                if ($file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE) {
                    $extension = strtolower($file->getExtension());
                    if (! $file->isValid() || ! in_array($extension, ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx'], true) || $file->getSize() > 5 * 1024 * 1024) {
                        $errors['attachment'] = 'File must be PDF, JPG, PNG, DOC, or DOCX and no larger than 5MB.';
                    } else {
                        $filename = bin2hex(random_bytes(16)) . '.' . $extension;
                        $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'tasks';
                        if (! is_dir($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                        }
                        $file->move($uploadPath, $filename);
                        if ($id !== null && ! empty($task['attachment']) && is_file($uploadPath . DIRECTORY_SEPARATOR . $task['attachment'])) {
                            unlink($uploadPath . DIRECTORY_SEPARATOR . $task['attachment']);
                        }
                        $values['attachment'] = $filename;
                    }
                }

                if ($errors === []) {
                    $id === null ? $model->insert($values) : $model->update($id, $values);
                    return redirect()->to('/tasks');
                }
            }

            $data['errors'] = array_merge($this->validator->getErrors(), $errors);
            $data['task'] = array_merge($task ?? [], $this->request->getPost());
        }

        return view('tasks/form', $data);
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Bayar;

class BayarController extends ResourceController
{
    protected $modelName = 'App\Models\Bayar';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index(): ResponseInterface
    {
        $data = [
            'message' => 'success',
            'data_bayar' => $this->model->findAll()
        ];
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null): ResponseInterface
    {
        $data_bayar = $this->model->find($id);
        if ($data_bayar) {
            return $this->respond($data_bayar, 200);
        } else {
            return $this->failNotFound('Data not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create(): ResponseInterface
    {
        $rules = $this->validate([
            'nis'        => 'required',
            'nama_siswa' => 'required',
            'nominal'    => 'required',
            'berita'     => 'required',
        ]);

        if(!$rules)
        {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Menambahkan Data
        $this->model->insert([
            'nis'       => esc($this->request->getVar('nis')),
            'nama_siswa'=> esc($this->request->getVar('nama_siswa')),
            'nominal'   => esc($this->request->getVar('nominal')),
            'berita'    => esc($this->request->getVar('berita')),
        ]);

        $response = [
            'message' => 'Data Berhasil Ditambahkan'
        ];

        return $this->respondCreated($response);
    }

    /**
     * Update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null): ResponseInterface
    {
        $rules = $this->validate([
            'nis'        => 'required',
            'nama_siswa' => 'required',
            'nominal'    => 'required',
            'berita'     => 'required',
        ]);

        if(!$rules)
        {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        // Menambahkan Data
        $this->model->update($id, [
            'nis'       => esc($this->request->getVar('nis')),
            'nama_siswa'=> esc($this->request->getVar('nama_siswa')),
            'nominal'   => esc($this->request->getVar('nominal')),
            'berita'    => esc($this->request->getVar('berita')),
        ]);

        $response = [
            'message' => 'Data Berhasil Diubah'
        ];
        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null): ResponseInterface
    {
        $this->model->delete($id);
        $response = [
            'message' => 'Data Berhasil Dihapus'
        ];
        return $this->respondDeleted($response, 200);
    }
}

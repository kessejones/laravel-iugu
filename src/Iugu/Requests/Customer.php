<?php

namespace Iugu\Requests;

use Exception;
use Iugu\Requests\Exceptions\NotFoundException;

class Customer extends AbstractRequest
{
    /**
     * Request all Iugu clients
     * @return object
     */
    public function clients()
    {
        $response = $this->request('customers');

        return $this->parseResponse($response);
    }

    /**
     * Request a client by ID
     * @param string $id
     * @return object
     */
    public function find(string $id)
    {
        $response = $this->request('customers/' . $id);

        return $this->parseResponse($response);
    }

    /**
     * Edit client by id
     * @param string $id
     * @param array $data
     * @return object
     */
    public function edit(string $id, array $data)
    {
        $response = $this->request('customers/' . $id, 'PUT', $data);

        return $this->parseResponse($response);
    }
}
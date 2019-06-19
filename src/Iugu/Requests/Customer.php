<?php

namespace Iugu\Requests;

use Exception;
use Iugu\Requests\Exceptions\NotFoundException;

class Customer extends AbstractRequest
{
    /**
     * All clients
     * @return object
     */
    public function clients()
    {
        $response = $this->request('customers');

        return $this->parseResponse($response);
    }

    /**
     * Find client
     * @param string $id
     * @return object
     */
    public function find(string $id)
    {
        $response = $this->request('customers/' . $id);

        return $this->parseResponse($response);
    }

    /**
     * Create new client
     * @param array $data
     * @return object
     */
    public function create(array $data)
    {
        $response = $this->request('customers', 'POST', $data);

        return $this->parseResponse($response);
    }
    
    /**
     * Edit client
     * @param string $id
     * @param array $data
     * @return object
     */
    public function edit(string $id, array $data)
    {
        $response = $this->request('customers/' . $id, 'PUT', $data);

        return $this->parseResponse($response);
    }
    
    /**
     * Delete client
     * @param string $id
     * @return object
     */
    public function delete(string $id)
    {
        $response = $this->request('customers/' . $id, 'DELETE');

        return $this->parseResponse($response);
    }
    
    /**
     * List payments client
     * @param string $id
     * @return object
     */
    public function payments(string $id)
    {
        $response = $this->request('customers/' . $id . '/payment_methods');

        return $this->parseResponse($response);
    }
   
    /**
     * Find payment client
     * @param string $id
     * @param string $payment
     * @return object
     */
    public function findPayment(string $id, string $payment)
    {
        $response = $this->request('customers/' . $id . '/payment_methods/' . $payment);

        return $this->parseResponse($response);
    }
    
    /**
     * Remove Payment client
     * @param string $id
     * @param string $payment
     * @return object
     */
    public function deletePayment(string $id, string $payment)
    {
        $response = $this->request('customers/' . $id . '/payment_methods/' . $payment, 'DELETE');

        return $this->parseResponse($response);
    }
    
    /**
     * Edit payment client
     * @param string $id
     * @param string $payment
     * @param array $data
     * @return object
     */
    public function editPayment(string $id, string $payment, array $data)
    {
        $response = $this->request('customers/' . $id . '/payment_methods/' . $payment, 'PUT', $data);

        return $this->parseResponse($response);
    }

    /**
     * Create payment client
     * @param string $id
     * @param string $payment
     * @param array $data
     * @return object
     */
    public function createPayment(string $id, array $data)
    {
        $response = $this->request('customers/' . $id . '/payment_methods/' . $payment, 'POST', $data);

        return $this->parseResponse($response);
    }
}